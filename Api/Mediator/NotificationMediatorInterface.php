<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Mediator;

interface NotificationMediatorInterface
{
    /**
     * Notify about request
     *
     * @param string $requestName
     * @return void
     *
     */
    public function notifyAboutRequest(string $requestName): void;
}
