<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Controller\Test;

use Maestro\DesignPatterns\Service\TemplateMethod\AbstractFileWriter;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Maestro\DesignPatterns\Api\TemplateMethod\FileWriterInterface;

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
        $resultContent = '';
        $this->dateFileWriter->writeDataToFile();
        $resultContent .= '<pre>Current Date: ' . file_get_contents(AbstractFileWriter::FILE_PATH) . '</pre>';
        $this->timeFileWriter->writeDataToFile();
        $resultContent .= '<pre>Current Time: ' . file_get_contents(AbstractFileWriter::FILE_PATH) . '</pre>';
        return $resultContent;
    }
}
