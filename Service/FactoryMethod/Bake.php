<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\FactoryMethod;

use InvalidArgumentException;
use Maestro\DesignPatterns\Api\FactoryMethod\FoodInterface;
use Maestro\DesignPatterns\Api\FactoryMethod\FoodFactoryMethodInterface;

/**
 * It is bake for cook food.
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
