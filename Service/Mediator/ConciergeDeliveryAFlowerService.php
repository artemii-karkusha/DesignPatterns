<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Mediator;

use ArtemiiKarkusha\DesignPatterns\Api\Mediator\ConciergeServiceInterface;

class ConciergeDeliveryAFlowerService implements ConciergeServiceInterface
{
    /**
     * @inheritDoc
     */
    public function executeRequestByName(string $requestName): void
    {
        echo 'Delivery a flower was called<br>';
    }
}
