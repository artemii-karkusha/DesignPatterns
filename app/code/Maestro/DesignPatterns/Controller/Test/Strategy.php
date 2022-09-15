<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Controller\Test;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Maestro\DesignPatterns\Api\Strategy\SorterListInterface;
use Maestro\DesignPatterns\Service\Strategy\FastSortStrategy;

class Strategy implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     * @param SorterListInterface $sorterList
     * @param FastSortStrategy $fastSortStrategy
     */
    public function __construct(
        readonly private ResultFactory $resultFactory,
        readonly private SorterListInterface $sorterList,
        readonly private FastSortStrategy $fastSortStrategy
    ) {
    }

    /**
     * @inheritDoc
     * @noinspection PhpCSValidationInspection
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)->setContents($this->getContents());
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        $list = range(0, 2000);
        $timeStart = microtime(true);
        $sortedBubbleArray = $this->sorterList->sort($list);
        $timeEnd = microtime(true);
        $executionTime = ($timeEnd - $timeStart);
        echo '<b>Total Execution Time sortedSmallArray:</b> '.$executionTime.' Sec <br>';

        $timeStart = microtime(true);
        $sortedBigArray = $this->sorterList->setSortStrategy($this->fastSortStrategy)->sort($list);
        $timeEnd = microtime(true);
        $executionTime = ($timeEnd - $timeStart);
        echo '<b>Total Execution Time sortedSmallArray:</b> '.$executionTime.' Sec <br>';
        $resultContent = '<div><b>Strategy</b></div>';
        $resultContent .= '<pre>Sorted Small Array: ' . count($sortedBubbleArray) . '</pre>';
        $resultContent .= '<pre>Sorted Big Array: ' . count($sortedBigArray) . '</pre>';
        return $resultContent;
    }
}
