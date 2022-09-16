<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\AbstractFactory;

use Maestro\DesignPatterns\Api\AbstractFactory\FoodFactoryMethodForKitchenInterface;
use Maestro\DesignPatterns\Service\FactoryMethod\FoodFactoryMethod;

use Maestro\DesignPatterns\Model\AbstractFactory\JapaneseFood\Noodles;
use Maestro\DesignPatterns\Model\AbstractFactory\JapaneseFood\Sushi;

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
