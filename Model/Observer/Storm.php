<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\Observer;

use ArtemiiKarkusha\DesignPatterns\Api\Observer\Model\StormInterface;

class Storm implements StormInterface
{
    /**
     * @var int
     */
    private int $levelOfStorm;

    /**
     * @var string
     */
    private string $location;

    /**
     * @param string $location
     * @param int $levelOfStorm
     */
    public function __construct(
        string $location,
        int $levelOfStorm = 0
    ) {
        $this->location = $location;
        $this->levelOfStorm = $levelOfStorm;
    }

    /**
     * @inheritDoc
     */
    public function isCritical(): bool
    {
        return $this->levelOfStorm >= 9;
    }

    /**
     * @inheritDoc
     */
    public function isNormal(): bool
    {
        return $this->levelOfStorm >= 5 && $this->levelOfStorm <= 8;
    }

    /**
     * @inheritDoc
     */
    public function isLow(): bool
    {
        return $this->levelOfStorm >= 1 && $this->levelOfStorm <= 5;
    }

    /**
     * @inheritDoc
     */
    public function getLocation(): string
    {
        return $this->location;
    }
}
