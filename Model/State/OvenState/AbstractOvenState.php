<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\State\OvenState;

use ArtemiiKarkusha\DesignPatterns\Api\State\Model\OvenInterface;
use ArtemiiKarkusha\DesignPatterns\Api\State\Model\OvenState\OvenStateInterface;

abstract class AbstractOvenState implements OvenStateInterface
{
    /**
     * @var OvenInterface
     */
    protected OvenInterface $oven;

    /**
     * @inheritDoc
     */
    public function setOven(OvenInterface $oven): OvenStateInterface
    {
        $this->oven = $oven;
        return $this;
    }
}
