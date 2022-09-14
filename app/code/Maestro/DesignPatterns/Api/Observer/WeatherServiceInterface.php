<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Observer;

use Maestro\DesignPatterns\Api\Observer\Model\StormInterface;

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
