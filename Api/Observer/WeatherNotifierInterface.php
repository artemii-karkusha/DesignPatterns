<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Observer;

use ArtemiiKarkusha\DesignPatterns\Api\Observer\Model\StormInterface;

interface WeatherNotifierInterface
{
    /**
     * @param WeatherObserverInterface $weatherObserver
     * @return void
     */
    public function attach(WeatherObserverInterface $weatherObserver): void;

    /**
     * @param WeatherObserverInterface $weatherObserver
     * @return void
     */
    public function detach(WeatherObserverInterface $weatherObserver): void;

    /**
     * @param StormInterface $storm
     * @return void
     */
    public function notify(StormInterface $storm): void;
}
