<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\CoR;

use ArtemiiKarkusha\DesignPatterns\Api\CoR\Model\PhoneInterface;
use ArtemiiKarkusha\DesignPatterns\Api\CoR\Service\EmergencyServiceCallerInterface;

class MedicalServiceCaller implements EmergencyServiceCallerInterface
{

    public const EMERGENCY_SERVICE_TYPE = 'medical';

    public const EMERGENCY_SERVICE_PHONE_NUMBER = '103';

    /**
     * @inheritDoc
     */
    public function call(PhoneInterface $phone): void
    {
        if ($phone->getNumber() !== self::EMERGENCY_SERVICE_PHONE_NUMBER) {
            return;
        }

        echo 'I will call to medical service;';
    }
}
