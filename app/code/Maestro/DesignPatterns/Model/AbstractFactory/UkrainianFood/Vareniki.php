<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\AbstractFactory\UkrainianFood;

use Maestro\DesignPatterns\Api\FactoryMethod\FoodInterface;

class Vareniki implements FoodInterface
{

    public const FOOD_NAME = 'vareniki';

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return self::FOOD_NAME;
    }
}
