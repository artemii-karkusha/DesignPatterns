<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\CoR;

use Maestro\DesignPatterns\Api\CoR\Model\PhoneInterface;

class Phone implements PhoneInterface
{
    /**
     * @var string
     */
    private string $phoneNumber;

    /**
     * @param string $phoneNumber
     */
    public function __construct(string $phoneNumber = '')
    {
        $this->setNumber($phoneNumber);
    }

    /**
     * @inheritDoc
     */
    public function getNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @inheritDoc
     */
    public function setNumber(string $phoneNumber): PhoneInterface
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
}
