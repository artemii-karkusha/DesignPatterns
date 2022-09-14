<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Observer;

use Maestro\DesignPatterns\Api\Observer\Model\StormInterface;
use Maestro\DesignPatterns\Api\Observer\Model\StormInterfaceFactory;
use Maestro\DesignPatterns\Api\Observer\WeatherServiceInterface;

class WeatherService implements WeatherServiceInterface
{
    /**
     * @var StormInterface[]
     */
    private array $stormInfoList = [];

    private const STORM_LEVEL_BY_LOCATION = [
        'Bratislava' => 1,
        'Wien' => 7,
        'Vinesia' => 10,
    ];

    /**
     * @param StormInterfaceFactory $stormInterfaceFactory
     */
    public function __construct(private readonly StormInterfaceFactory $stormInterfaceFactory)
    {
    }

    /**
     * @inheritDoc
     */
    public function isStorm(string $location): bool
    {
        $storm = $this->getStormInfo($location);
        return $storm->isLow() || $storm->isNormal() || $storm->isCritical();
    }

    /**
     * @inheritDoc
     */
    public function getStormInfo(string $location): StormInterface
    {
        if ($this->isStormInformationAboutLocationNotExist($location)) {
            $this->stormInfoList[$location] = $this->createStormModel($location);
        }
        return $this->stormInfoList[$location];
    }

    /**
     *
     * @param string $location
     * @return int
     */
    private function getStormLevelFromThirdPartyServiceByLocation(string $location): int
    {
        return self::STORM_LEVEL_BY_LOCATION[$location] ?? 0;
    }

    /**
     *
     * @param string $location
     * @return bool
     */
    private function isStormInformationAboutLocationNotExist(string $location): bool
    {
        return !isset($this->stormInfoList[$location]);
    }

    /**
     *
     * @param string $location
     * @return StormInterface
     */
    private function createStormModel(string $location): StormInterface
    {
        return $this->stormInterfaceFactory->create(
            [
                'location' => $location,
                'levelOfStorm' => $this->getStormLevelFromThirdPartyServiceByLocation($location)
            ]
        );
    }
}
