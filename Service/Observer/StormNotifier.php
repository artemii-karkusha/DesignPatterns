<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Observer;

use Maestro\DesignPatterns\Api\Observer\Model\StormInterface;
use Maestro\DesignPatterns\Api\Observer\WeatherNotifierInterface;
use Maestro\DesignPatterns\Api\Observer\WeatherObserverInterface;
use SplObjectStorage;

class StormNotifier implements WeatherNotifierInterface
{
    /**
     * @var SplObjectStorage|WeatherObserverInterface[]
     */
    private SplObjectStorage $observers;

    /**
     * @param WeatherObserverInterface[] $weatherObservers
     */
    public function __construct(array $weatherObservers = [])
    {
        $this->attachObserversToStorage($weatherObservers);
    }

    /**
     * @inheritDoc
     */
    public function attach(WeatherObserverInterface $weatherObserver): void
    {
        $this->observers->attach($weatherObserver);
    }

    /**
     * @inheritDoc
     */
    public function detach(WeatherObserverInterface $weatherObserver): void
    {
        $this->observers->detach($weatherObserver);
    }

    /**
     * @inheritDoc
     */
    public function notify(StormInterface $storm): void
    {
        echo "StormNotifier: Notifying weather observers...<br>";
        foreach ($this->observers as $weatherObserver) {
            $weatherObserver->update($storm);
        }
    }

    /**
     * @param WeatherObserverInterface[] $weatherObservers
     * @return void
     */
    private function attachObserversToStorage(array $weatherObservers): void
    {
        $this->observers = new SplObjectStorage();
        foreach ($weatherObservers as $weatherObserver) {
            $this->observers->attach($weatherObserver);
        }
    }
}
