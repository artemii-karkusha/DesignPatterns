<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\CoR\Model;

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
