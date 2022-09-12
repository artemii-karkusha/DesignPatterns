<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Mediator;

use Maestro\DesignPatterns\Api\Mediator\ConciergeServiceInterface;
use Maestro\DesignPatterns\Api\Mediator\NotificationMediatorInterface;
use Magento\Framework\Exception\NotFoundException;

class ConciergeServiceManager implements ConciergeServiceInterface
{
    /**
     * @var ConciergeServiceInterface[]
     */
    private array $conciergeServices;

    /**
     * @var NotificationMediatorInterface
     */
    private NotificationMediatorInterface $notificationMediator;

    /**
     * @param ConciergeServiceInterface[] $conciergeServices
     */
    public function __construct(
        NotificationMediatorInterface $notificationMediator,
        array $conciergeServices = []
    ) {
        $this->conciergeServices = $conciergeServices;
        $this->notificationMediator = $notificationMediator;
    }

    /**
     * @inheritDoc
     */
    public function executeRequestByName(string $requestName): void
    {
        if (!isset($this->conciergeServices[$requestName])) {
            throw new NotFoundException(__(sprintf('Request by name the %s is not exist ', $requestName)));
        }

        $this->conciergeServices[$requestName]->executeRequestByName($requestName);
        $this->notificationMediator->notifyAboutRequest($requestName);
    }
}
