<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Mediator;

use ArtemiiKarkusha\DesignPatterns\Api\Mediator\NotificationMediatorInterface;

class NotificationMediatorAboutCallAMaster implements NotificationMediatorInterface
{
    /**
     * @inheritDoc
     */
    public function notifyAboutRequest(string $requestName): void
    {
        echo 'Notify all about call a master. <br>';
        echo 'Notify an accounting about price a master. <br>';
    }
}
