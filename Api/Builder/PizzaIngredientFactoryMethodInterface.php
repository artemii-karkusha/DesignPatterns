<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Builder;

use InvalidArgumentException;

interface PizzaIngredientFactoryMethodInterface
{
    /**
     *
     * @param string $ingredient
     * @return IngredientForPizzaInterface
     * @throws InvalidArgumentException
     */
    public function createIngredient(string $ingredient): IngredientForPizzaInterface;
}
