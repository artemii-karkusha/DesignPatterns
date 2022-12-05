<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Observer;

use ArtemiiKarkusha\DesignPatterns\Api\Observer\Model\StormInterface;

interface WeatherObserverInterface
{
    /**
     * @param StormInterface $storm
     * @return void
     */
    public function update(StormInterface $storm): void;
}
