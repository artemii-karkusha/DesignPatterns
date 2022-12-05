<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Prototype;

/**
 * Interface for cart
 */
interface CarInterface
{
    public const TYPE_CAR_PASSENGER = 'passenger';
    public const TYPE_CAR_TRUCK = 'truck';
    public const TYPE_CAR_MINIVAN = 'minivan';

    /**
     * Get car color
     *
     * @return string
     */
    public function getColor(): string;

    /**
     * Set car color
     *
     * @param string $color
     * @return CarInterface
     */
    public function setColor(string $color): CarInterface;

    /**
     * Get car number
     *
     * @return string
     */
    public function getNumber(): string;

    /**
     * Set car number
     *
     * @param string $number
     * @return CarInterface
     */
    public function setNumber(string $number): CarInterface;

    /**
     * Get car type
     *
     * @return string [optional]
     */
    public function getTypeCar(): string;

    /**
     * Set type car
     *
     * @param string $typeCar
     * @return CarInterface
     */
    public function setTypeCar(string $typeCar): CarInterface;
}
