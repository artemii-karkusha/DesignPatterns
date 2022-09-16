<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\State\OvenState;

use Maestro\DesignPatterns\Api\State\Model\OvenInterface;
use Maestro\DesignPatterns\Api\State\Model\OvenState\OvenStateInterface;

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
