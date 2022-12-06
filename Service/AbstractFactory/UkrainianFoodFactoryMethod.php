<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\AbstractFactory;

use ArtemiiKarkusha\DesignPatterns\Api\AbstractFactory\FoodFactoryMethodForKitchenInterface;
use ArtemiiKarkusha\DesignPatterns\Service\FactoryMethod\FoodFactoryMethod;

use ArtemiiKarkusha\DesignPatterns\Model\AbstractFactory\UkrainianFood\Borsch;
use ArtemiiKarkusha\DesignPatterns\Model\AbstractFactory\UkrainianFood\Vareniki;

class UkrainianFoodFactoryMethod extends FoodFactoryMethod implements FoodFactoryMethodForKitchenInterface
{
    public const UKRAINIAN_KITCHEN = 'ukrainian_kitchen';

    /**
     * @var string[]
     */
    public static array $foodFactoryList = [
        Borsch::FOOD_NAME => Borsch::class,
        Vareniki::FOOD_NAME => Vareniki::class
    ];

    /**
     * @inheritDoc
     */
    public function getKitchenName(): string
    {
        return self::UKRAINIAN_KITCHEN;
    }
}
