<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Api\Observer\WeatherServiceInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Observer\WeatherNotifierInterface;
use Magento\Framework\Controller\ResultInterface;

class Observer implements HttpGetActionInterface
{
    /**
     *
     * @param ResultFactory $resultFactory
     * @param WeatherServiceInterface $weatherService
     * @param WeatherNotifierInterface $weatherNotifier
     */
    public function __construct(
        readonly private ResultFactory $resultFactory,
        readonly private WeatherServiceInterface $weatherService,
        readonly private WeatherNotifierInterface $weatherNotifier
    ) {
    }

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
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
