<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\AbstractFactory;

use ArtemiiKarkusha\DesignPatterns\Api\AbstractFactory\FoodFactoryMethodForKitchenInterface;
use ArtemiiKarkusha\DesignPatterns\Service\FactoryMethod\FoodFactoryMethod;

use ArtemiiKarkusha\DesignPatterns\Model\AbstractFactory\JapaneseFood\Noodles;
use ArtemiiKarkusha\DesignPatterns\Model\AbstractFactory\JapaneseFood\Sushi;

class JapaneseFoodFactoryMethod extends FoodFactoryMethod implements FoodFactoryMethodForKitchenInterface
{
    public const JAPANESE_KITCHEN = 'japanese_kitchen';

    /**
     * @var string[]
     */
    public static $foodFactoryList = [
        Noodles::FOOD_NAME => Noodles::class,
        Sushi::FOOD_NAME => Sushi::class
    ];

    /**
     * @inheritDoc
     */
    public function getKitchenName(): string
    {
        return self::JAPANESE_KITCHEN;
    }
}
