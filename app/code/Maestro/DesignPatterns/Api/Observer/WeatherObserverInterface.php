<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Observer;

use Maestro\DesignPatterns\Api\Observer\Model\StormInterface;

interface WeatherObserverInterface
{
    /**
     * @param StormInterface $storm
     * @return void
     */
    public function update(StormInterface $storm): void;
}
