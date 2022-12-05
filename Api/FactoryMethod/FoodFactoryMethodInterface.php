<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\FactoryMethod;

use InvalidArgumentException;

interface FoodFactoryMethodInterface
{
    /**
     * Create food by foodName
     *
     * @param string $foodName
     * @return FoodInterface
     * @throws InvalidArgumentException
     */
    public function createFood(string $foodName): FoodInterface;

    /**
     * Create foods
     *
     * @return FoodInterface[]
     */
    public function createFoods(): array;
}
