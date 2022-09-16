<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Mediator;

use Maestro\DesignPatterns\Api\Mediator\NotificationMediatorInterface;
use Magento\Framework\Exception\NotFoundException;

class NotificationMediatorManager implements NotificationMediatorInterface
{
    /**
     * @var NotificationMediatorInterface[]
     */
    private array $notifyMediators;

    /**
     * @param NotificationMediatorInterface[] $notifyMediators
     */
    public function __construct(array $notifyMediators = [])
    {
        $this->notifyMediators = $notifyMediators;
    }

    /**
     * @inheritDoc
     */
    public function notifyAboutRequest(string $requestName): void
    {
        if (!isset($this->notifyMediators[$requestName])) {
            return;
        }

        $this->notifyMediators[$requestName]->notifyAboutRequest($requestName);
    }
}
