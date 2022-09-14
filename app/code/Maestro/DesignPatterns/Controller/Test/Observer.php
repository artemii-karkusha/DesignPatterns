<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Controller\Test;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Maestro\DesignPatterns\Api\Observer\WeatherServiceInterface;
use Maestro\DesignPatterns\Api\Observer\WeatherNotifierInterface;

class Observer implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     * @param WeatherServiceInterface $weatherService
     */
    public function __construct(
        readonly private ResultFactory $resultFactory,
        readonly private WeatherServiceInterface $weatherService,
        readonly private WeatherNotifierInterface $weatherNotifier
    ) {}

    /**
     * @inheritDoc
     * @noinspection PhpCSValidationInspection
     */
    public function execute()
    {
        $this->getContents();
        return $this->resultFactory->create(ResultFactory::TYPE_RAW);
    }

    /**
     * @return void
     */
    public function getContents(): void
    {
        $locations = ['Bratislava', 'Wien', 'Vinesia'];
        foreach ($locations as $location) {
            $this->cronWhichCheckWeatherByLocation($location);
        }
    }

    /**
     * @param string $location
     * @return void
     */
    private function cronWhichCheckWeatherByLocation(string $location): void
    {
        $storm = $this->weatherService->getStormInfo($location);
        $this->weatherNotifier->notify($storm);
    }
}