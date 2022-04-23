<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\AbstractFactory\AmericanFood;

use Maestro\DesignPatterns\Api\FactoryMethod\FoodInterface;

class FriedPotatoes implements FoodInterface
{

    public const FOOD_NAME = 'fried_potatoes';

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return self::FOOD_NAME;
    }
}
