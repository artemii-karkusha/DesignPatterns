<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Builder;

use InvalidArgumentException;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\IngredientForPizzaInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaIngredientFactoryMethodInterface;

class PizzaIngredientFactoryMethod implements PizzaIngredientFactoryMethodInterface
{
    /**
     * @var string[]
     */
    private array $pizzaIngredients;

    /**
     * @param array $pizzaIngredients
     */
    public function __construct(array $pizzaIngredients = [])
    {
        $this->pizzaIngredients = $pizzaIngredients;
    }

    /**
     * @inheritDoc
     */
    public function createIngredient(string $ingredient): IngredientForPizzaInterface
    {
        foreach ($this->pizzaIngredients as $ingredientName => $classForCreation) {
            if ($ingredientName !== $ingredient) {
                continue;
            }

            return new $classForCreation();
        }
        throw new InvalidArgumentException(
            (string)__('Ingredient the %1 doesnt\'t exist', $ingredient)
        );
    }
}
