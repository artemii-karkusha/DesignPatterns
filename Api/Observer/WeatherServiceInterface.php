<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Observer;

use ArtemiiKarkusha\DesignPatterns\Api\Observer\Model\StormInterface;

interface WeatherServiceInterface
{
    /**
     * @param string $location
     * @return bool
     */
    public function isStorm(string $location): bool;

    /**
     * @param string $location
     * @return StormInterface
     */
    public function getStormInfo(string $location): StormInterface;
}
