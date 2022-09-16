<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\FactoryMethod;

use InvalidArgumentException;
use Maestro\DesignPatterns\Api\FactoryMethod\FoodFactoryMethodInterface;
use Maestro\DesignPatterns\Api\FactoryMethod\FoodInterface;
use Maestro\DesignPatterns\Model\FactoryMethod\Meat;
use Maestro\DesignPatterns\Model\FactoryMethod\Potato;

class FoodFactoryMethod implements FoodFactoryMethodInterface
{
    /**
     * @var string[]
     */
    public static $foodFactoryList = [
        Meat::MEAT_NAME => Meat::class,
        Potato::MEAT_NAME => Potato::class
    ];

    /**
     * @inheritDoc
     */
    public function createFood(string $foodName): FoodInterface
    {
        $className = $this->getClassNameByFoodName($foodName);
        return new $className();
    }

    /**
     * Get full class name by food name
     *
     * @param string $foodName
     * @return string
     */
    private function getClassNameByFoodName(string $foodName): string
    {
        if (!isset(static::$foodFactoryList[$foodName])) {
            throw new InvalidArgumentException((string)__('Class for %1 don\'t exist', $foodName));
        }
        return static::$foodFactoryList[$foodName];
    }

    /**
     * @inheritDoc
     */
    public function createFoods(): array
    {
        $foods = [];
        foreach (static::$foodFactoryList as $foodName => $foodClass) {
            $foods[] = $this->createFood($foodName);
        }
        return $foods;
    }
}
