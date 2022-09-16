<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\State;

use Maestro\DesignPatterns\Api\State\Model\OvenInterface;
use Maestro\DesignPatterns\Api\State\Model\OvenState\OvenStateInterface;
use Maestro\DesignPatterns\Model\State\OvenState\ColdFactory as OvenStateColdFactory;

class Oven implements OvenInterface
{
    /**
     * @var OvenStateInterface
     */
    private OvenStateInterface $state;

    /**
     * @param OvenStateColdFactory $ovenStateColdFactory
     */
    public function __construct(OvenStateColdFactory $ovenStateColdFactory)
    {
        $this->transitionToOvenState($ovenStateColdFactory->create());
    }

    /**
     * @inheritDoc
     */
    public function bake(): void
    {
        $this->state->bake();
    }

    /**
     * @inheritDoc
     */
    public function transitionToOvenState(OvenStateInterface $ovenState): void
    {
        echo "Oven: Transition to " . get_class($ovenState) . "<br>";
        $this->state = $ovenState;
        $this->state->setOven($this);
    }

    /**
     * @return void
     */
    public function warm(): void
    {
        $this->state->warm();
    }
}
