<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\CoR\Model;

interface PhoneInterface
{
    /**
     * @return string
     */
    public function getNumber(): string;

    /**
     * @param string $phoneNumber
     * @return PhoneInterface
     */
    public function setNumber(string $phoneNumber): PhoneInterface;

}
