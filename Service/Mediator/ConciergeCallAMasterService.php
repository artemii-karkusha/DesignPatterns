<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Mediator;

use ArtemiiKarkusha\DesignPatterns\Api\Mediator\ConciergeServiceInterface;

class ConciergeCallAMasterService implements ConciergeServiceInterface
{
    /**
     * @inheritDoc
     */
    public function executeRequestByName(string $requestName): void
    {
        echo 'Master was called<br>';
    }
}
