<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\CoR;

use Maestro\DesignPatterns\Api\CoR\Model\PhoneInterface;
use Maestro\DesignPatterns\Api\CoR\Service\EmergencyServiceCallerInterface;

class PoliceDepartmentCallerService implements EmergencyServiceCallerInterface
{

    public const EMERGENCY_SERVICE_TYPE = 'police';

    public const EMERGENCY_SERVICE_PHONE_NUMBER = '102';

    /**
     * @inheritDoc
     */
    public function call(PhoneInterface $phone): void
    {
        if ($phone->getNumber() !== self::EMERGENCY_SERVICE_PHONE_NUMBER) {
            return;
        }

        echo 'I will call to police department;';
    }
}
