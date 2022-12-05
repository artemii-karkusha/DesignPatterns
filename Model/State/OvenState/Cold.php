<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\State\OvenState;

use RuntimeException;

class Cold extends AbstractOvenState
{
    /**
     * @inheritDoc
     */
    public function bake(): void
    {
        throw new RuntimeException('Oven is cold. We can\'t use the oven. The oven should be warmed');
    }

    /**
     * @inheritDoc
     */
    public function warm(): void
    {
        $this->oven->transitionToOvenState(new ReadyToWork());
    }
}
