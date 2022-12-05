<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\Builder;

use InvalidArgumentException;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\IngredientForPizzaInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;

class Pizza implements PizzaInterface
{
    /**
     * @var IngredientForPizzaInterface[]
     */
    private array $ingredients = [];

    /**
     * @inheritDoc
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    /**
     * @inheritDoc
     */
    public function setIngredients(array $ingredients): PizzaInterface
    {
        foreach ($ingredients as $ingredient) {
            if (!$ingredient instanceof IngredientForPizzaInterface) {
                throw new InvalidArgumentException(
                    (string)__('Ingredient the %1 have incorrect type', $ingredient->getName())
                );
            }

            $this->addIngredient($ingredient);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addIngredient(IngredientForPizzaInterface $ingredientForPizza): PizzaInterface
    {
        $this->ingredients[] = $ingredientForPizza;
        return $this;
    }
}
