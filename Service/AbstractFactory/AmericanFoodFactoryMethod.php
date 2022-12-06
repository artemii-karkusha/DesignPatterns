<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\AbstractFactory;

use ArtemiiKarkusha\DesignPatterns\Service\FactoryMethod\FoodFactoryMethod;
use ArtemiiKarkusha\DesignPatterns\Api\AbstractFactory\FoodFactoryMethodForKitchenInterface;
use ArtemiiKarkusha\DesignPatterns\Model\AbstractFactory\AmericanFood\Burger;
use ArtemiiKarkusha\DesignPatterns\Model\AbstractFactory\AmericanFood\FriedPotatoes;

class AmericanFoodFactoryMethod extends FoodFactoryMethod implements FoodFactoryMethodForKitchenInterface
{
    public const AMERICAN_KITCHEN = 'american_kitchen';

    /**
     * @var string[]
     */
    public static array $foodFactoryList = [
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
