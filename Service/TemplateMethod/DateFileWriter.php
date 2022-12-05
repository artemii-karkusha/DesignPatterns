<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\TemplateMethod;

class DateFileWriter extends AbstractFileWriter
{
    /**
     * @inheritDoc
     */
    public function getDataToWrite(): string
    {
        return date('Y-m-d');
    }
}
