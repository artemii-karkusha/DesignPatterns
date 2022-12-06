<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\FactoryMethod;

use InvalidArgumentException;
use ArtemiiKarkusha\DesignPatterns\Api\FactoryMethod\FoodInterface;
use ArtemiiKarkusha\DesignPatterns\Api\FactoryMethod\FoodFactoryMethodInterface;

/**
 * It is a bake for cook food.
 */
class Bake
{
    /**
     * @var FoodFactoryMethodInterface
     */
    private FoodFactoryMethodInterface $foodFactoryMethod;

    /**
     * @param FoodFactoryMethodInterface $foodFactoryMethod
     */
    public function __construct(FoodFactoryMethodInterface $foodFactoryMethod)
    {
        $this->foodFactoryMethod = $foodFactoryMethod;
    }

    /**
     * Get food object by food name
     * @param string $foodName
     * @return FoodInterface
     * @throws InvalidArgumentException
     */
    public function cook(string $foodName): FoodInterface
    {
        return $this->foodFactoryMethod->createFood($foodName);
    }
}
