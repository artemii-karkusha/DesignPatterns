<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Prototype;

use Maestro\DesignPatterns\Api\Prototype\CarInterface;
use Maestro\DesignPatterns\Api\Prototype\CarInterfaceFactory;

class CarPrototype
{
    /**
     * @var null|CarInterface
     */
    private ?CarInterface $car = null;

    /**
     * @var CarInterfaceFactory
     */
    private CarInterfaceFactory $carFactory;

    /**
     * @param CarInterfaceFactory $carFactory
     */
    public function __construct(CarInterfaceFactory $carFactory)
    {
        $this->carFactory = $carFactory;
    }

    /**
     * Create passenger car
     *
     * @param string $color
     * @param string $number
     * @return CarInterface
     */
    public function createPassengerCar(string $color, string $number): CarInterface
    {
        return $this->clone()
            ->setNumber($number)
            ->setColor($color)
            ->setTypeCar(CarInterface::TYPE_CAR_PASSENGER);
    }

    /**
     * Create truck
     *
     * @param string $color
     * @param string $number
     * @return CarInterface
     */
    public function createTruck(string $color, string $number): CarInterface
    {
        return $this->clone()
            ->setNumber($number)
            ->setColor($color)
            ->setTypeCar(CarInterface::TYPE_CAR_TRUCK);
    }

    /**
     * Create minivan
     *
     * @param string $color
     * @param string $number
     * @return CarInterface
     */
    public function createMinivan(string $color, string $number): CarInterface
    {
        return $this->clone()
            ->setNumber($number)
            ->setColor($color)
            ->setTypeCar(CarInterface::TYPE_CAR_MINIVAN);
    }

    /**
     * Clone
     *
     * @return CarInterface
     */
    private function clone(): CarInterface
    {
        if ($this->car === null) {
            $this->car = $this->carFactory->create();
        }
        return clone $this->car;
    }
}
