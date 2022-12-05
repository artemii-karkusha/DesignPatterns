<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\CoR\Service;

use ArtemiiKarkusha\DesignPatterns\Api\CoR\Model\PhoneInterface;

interface EmergencyServiceCallerInterface
{
    /**
     * @param PhoneInterface $phone
     * @return void
     */
    public function call(PhoneInterface $phone): void;
}
