<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\State;

use ArtemiiKarkusha\DesignPatterns\Api\State\Model\OvenInterface;
use ArtemiiKarkusha\DesignPatterns\Api\State\Model\OvenState\OvenStateInterface;
use ArtemiiKarkusha\DesignPatterns\Model\State\OvenState\ColdFactory as OvenStateColdFactory;

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
        echo sprintf('Oven: Transition to %s<br>', get_class($ovenState));
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
