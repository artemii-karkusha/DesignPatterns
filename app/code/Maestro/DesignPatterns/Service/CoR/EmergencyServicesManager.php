<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\CoR;

use Maestro\DesignPatterns\Api\CoR\Service\EmergencyServicesManagerInterface;
use Maestro\DesignPatterns\Api\CoR\Model\PhoneInterface;
use Maestro\DesignPatterns\Api\CoR\Service\EmergencyServiceCallerInterface;

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
