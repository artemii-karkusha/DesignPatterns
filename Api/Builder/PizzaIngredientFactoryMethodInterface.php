<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Builder;

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
