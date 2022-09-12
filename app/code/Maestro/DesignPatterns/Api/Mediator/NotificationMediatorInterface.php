<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Mediator;

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
