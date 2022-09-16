<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\TemplateMethod;

interface FileWriterInterface
{
    /**
     *
     * @return void
     */
    public function writeDataToFile(): void;
}
