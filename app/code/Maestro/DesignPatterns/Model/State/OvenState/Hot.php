<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\State\OvenState;

use RuntimeException;

class Hot extends AbstractOvenState
{
    /**
     * @inheritDoc
     */
    public function bake(): void
    {
        throw new RuntimeException('Oven is hot. We can\'t use the oven. The oven should be cold down');
    }

    /**
     * @inheritDoc
     */
    public function warm(): void
    {
        echo 'Oven is already hot <br>';
    }
}
