<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use InvalidArgumentException;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Service\Singleton\Persons;

/**
 * Controller for test Singleton functionality
 */
class Singleton implements HttpGetActionInterface
{
    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;

    /**
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        ResultFactory $resultFactory
    ) {
        $this->resultFactory = $resultFactory;
    }

    /**
     * Execute action based on request and return result
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {

        try {
            $persons = [];
            for ($i = 0; $i < 15; $i++) {
                $persons[] = Persons::getInstance();
            }

        } catch (InvalidArgumentException $invalidArgumentException) {
            throw new NotFoundException(__($invalidArgumentException->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)->setContents($this->getResponseText($persons));
    }

    /**
     * @param Persons[] $personsList
     * @return string
     */
    private function getResponseText(array $personsList): string
    {
        $responseText = '';
        foreach ($personsList as $persons) {
            $responseText .= sprintf(
                "<br>Persons data number\"#%s\"{ persons hash: \"%s\"}",
                spl_object_id($persons),
                $persons->getHash(),
            );
        }

        return $responseText;
    }
}
