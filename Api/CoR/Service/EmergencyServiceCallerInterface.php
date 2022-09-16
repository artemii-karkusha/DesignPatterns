<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\CoR\Service;

use Maestro\DesignPatterns\Api\CoR\Model\PhoneInterface;

interface EmergencyServiceCallerInterface
{
    /**
     * @param PhoneInterface $phone
     * @return void
     */
    public function call(PhoneInterface $phone): void;
}
