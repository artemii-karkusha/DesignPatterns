<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\State\OvenState;

class ReadyToWork extends AbstractOvenState
{
    /**
     * @inheritDoc
     */
    public function bake(): void
    {
        echo "Oven has cooked something <br>";
    }

    /**
     * @inheritDoc
     */
    public function warm(): void
    {
        $this->oven->transitionToOvenState(new Hot());
    }
}
