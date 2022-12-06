<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use ArtemiiKarkusha\DesignPatterns\Service\TemplateMethod\AbstractFileWriter;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Api\TemplateMethod\FileWriterInterface;
use Magento\Framework\Controller\ResultInterface;

class TemplateMethod implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     * @param FileWriterInterface $dateFileWriter
     * @param FileWriterInterface $timeFileWriter
     */
    public function __construct(
        readonly private ResultFactory $resultFactory,
        readonly private FileWriterInterface $dateFileWriter,
        readonly private FileWriterInterface $timeFileWriter
    ) {
    }

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)->setContents($this->getContents());
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        $resultContent = '';
        $this->dateFileWriter->writeDataToFile();
        $resultContent .= '<pre>Current Date: ' . file_get_contents(AbstractFileWriter::FILE_PATH) . '</pre>';
        $this->timeFileWriter->writeDataToFile();
        $resultContent .= '<pre>Current Time: ' . file_get_contents(AbstractFileWriter::FILE_PATH) . '</pre>';
        return $resultContent;
    }
}
