<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\CoR;

use ArtemiiKarkusha\DesignPatterns\Api\CoR\Service\EmergencyServicesManagerInterface;
use ArtemiiKarkusha\DesignPatterns\Api\CoR\Model\PhoneInterface;
use ArtemiiKarkusha\DesignPatterns\Api\CoR\Service\EmergencyServiceCallerInterface;

class EmergencyServicesManager implements EmergencyServicesManagerInterface
{
    /**
     * @var EmergencyServiceCallerInterface[]
     */
    private array $emergencyServicesCallers;

    /**
     * @param EmergencyServiceCallerInterface[] $emergencyServicesCallers
     */
    public function __construct(array $emergencyServicesCallers = [])
    {
        $this->emergencyServicesCallers = $emergencyServicesCallers;
    }

    /**
     * @inheritDoc
     */
    public function call(PhoneInterface $phone): void
    {
        foreach ($this->emergencyServicesCallers as $emergencyServicesCaller) {
            $emergencyServicesCaller->call($phone);
        }
    }
}
