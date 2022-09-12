<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Mediator;

use Maestro\DesignPatterns\Api\Mediator\NotificationMediatorInterface;

class NotificationMediatorAboutCallATaxi implements NotificationMediatorInterface
{
    /**
     * @inheritDoc
     */
    public function notifyAboutRequest(string $requestName): void
    {
        echo 'Notify all about call a taxi. <br>';
        echo 'Notify a accounting about price a taxi <br>';
    }
}
