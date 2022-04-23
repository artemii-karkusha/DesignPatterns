<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\AbstractFactory;

use Maestro\DesignPatterns\Api\AbstractFactory\FoodFactoryMethodForKitchenInterface;
use Maestro\DesignPatterns\Service\FactoryMethod\FoodFactoryMethod;

use Maestro\DesignPatterns\Model\AbstractFactory\UkrainianFood\Borsch;
use Maestro\DesignPatterns\Model\AbstractFactory\UkrainianFood\Vareniki;

class UkrainianFoodFactoryMethod extends FoodFactoryMethod implements FoodFactoryMethodForKitchenInterface
{
    public const UKRAINIAN_KITCHEN = 'ukrainian_kitchen';

    /**
     * @var string[]
     */
    public static $foodFactoryList = [
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
