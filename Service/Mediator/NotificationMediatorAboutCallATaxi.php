<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Mediator;

use ArtemiiKarkusha\DesignPatterns\Api\Mediator\NotificationMediatorInterface;

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
