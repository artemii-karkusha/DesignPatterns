<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\AbstractFactory\UkrainianFood;

use Maestro\DesignPatterns\Api\FactoryMethod\FoodInterface;

class Borsch implements FoodInterface
{

    public const FOOD_NAME = 'borsch';

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return self::FOOD_NAME;
    }
}
