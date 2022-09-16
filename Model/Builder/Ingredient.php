<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\Builder;

abstract class Ingredient implements \Maestro\DesignPatterns\Api\Builder\IngredientForPizzaInterface
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
