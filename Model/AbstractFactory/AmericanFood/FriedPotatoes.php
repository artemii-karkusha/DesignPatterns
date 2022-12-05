<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\AbstractFactory\AmericanFood;

use ArtemiiKarkusha\DesignPatterns\Api\FactoryMethod\FoodInterface;

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
