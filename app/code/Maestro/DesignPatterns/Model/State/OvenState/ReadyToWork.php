<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\State\OvenState;

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
