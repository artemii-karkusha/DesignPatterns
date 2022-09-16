<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\AbstractFactory;

use Maestro\DesignPatterns\Service\FactoryMethod\FoodFactoryMethod;
use Maestro\DesignPatterns\Api\AbstractFactory\FoodFactoryMethodForKitchenInterface;
use Maestro\DesignPatterns\Model\AbstractFactory\AmericanFood\Burger;
use Maestro\DesignPatterns\Model\AbstractFactory\AmericanFood\FriedPotatoes;

class AmericanFoodFactoryMethod extends FoodFactoryMethod implements FoodFactoryMethodForKitchenInterface
{
    public const AMERICAN_KITCHEN = 'american_kitchen';

    /**
     * @var string[]
     */
    public static $foodFactoryList = [
        Burger::FOOD_NAME => Burger::class,
        FriedPotatoes::FOOD_NAME => FriedPotatoes::class
    ];

    /**
     * @inheritDoc
     */
    public function getKitchenName(): string
    {
        return self::AMERICAN_KITCHEN;
    }
}
