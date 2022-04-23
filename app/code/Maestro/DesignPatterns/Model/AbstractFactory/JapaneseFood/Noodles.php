<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\AbstractFactory\JapaneseFood;

use Maestro\DesignPatterns\Api\FactoryMethod\FoodInterface;

class Noodles implements FoodInterface
{

    public const FOOD_NAME = 'noodles';

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return self::FOOD_NAME;
    }
}
