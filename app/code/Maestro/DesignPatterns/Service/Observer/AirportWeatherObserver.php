<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Observer;

use Maestro\DesignPatterns\Api\Observer\Model\StormInterface;
use Maestro\DesignPatterns\Api\Observer\WeatherObserverInterface;

class AirportWeatherObserver implements WeatherObserverInterface
{
    /**
     * @inheritDoc
     */
    public function update(StormInterface $storm): void
    {
        echo sprintf('Notify all airport about storm . Location: %s. <br>', $storm->getLocation());
    }
}
