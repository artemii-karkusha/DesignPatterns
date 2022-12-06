<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\Builder;

use ArtemiiKarkusha\DesignPatterns\Api\Builder\IngredientForPizzaInterface;

abstract class Ingredient implements IngredientForPizzaInterface
{
    public const INGREDIENT_NAME = '';

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return static::INGREDIENT_NAME;
    }
}
