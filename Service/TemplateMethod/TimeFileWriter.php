<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\TemplateMethod;

class TimeFileWriter extends AbstractFileWriter
{
    /**
     * @inheritDoc
     */
    public function getDataToWrite(): string
    {
        return date('H:i:s');
    }
}
