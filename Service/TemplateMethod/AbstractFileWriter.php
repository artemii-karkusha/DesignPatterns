<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\TemplateMethod;

use ArtemiiKarkusha\DesignPatterns\Api\TemplateMethod\FileWriterInterface;

abstract class AbstractFileWriter implements FileWriterInterface
{

    public const FILE_PATH = '/home/dev/sites/magento/var/template_method_demonstration.txt';

    /**
     * @inheritDoc
     */
    public function writeDataToFile(): void
    {
        file_put_contents(self::FILE_PATH, $this->getDataToWrite());
    }

    /**
     * @return string
     */
    abstract public function getDataToWrite(): string;
}
