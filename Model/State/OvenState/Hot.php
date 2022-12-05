<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\State\OvenState;

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
