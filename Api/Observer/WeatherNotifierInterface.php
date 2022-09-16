<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Observer;

use Maestro\DesignPatterns\Api\Observer\Model\StormInterface;

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
