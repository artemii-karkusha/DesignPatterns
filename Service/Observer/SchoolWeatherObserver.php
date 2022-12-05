<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Observer;

use ArtemiiKarkusha\DesignPatterns\Api\Observer\Model\StormInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Observer\WeatherNotifierInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Observer\WeatherObserverInterface;

class SchoolWeatherObserver implements WeatherObserverInterface
{
    /**
     * @inheritDoc
     */
    public function update(StormInterface $storm): void
    {
        if ($storm->isLow() || $storm->isNormal()) {
            return;
        }

        echo sprintf('Notify all school email about storm. Location: %s <br>', $storm->getLocation());
    }
}
