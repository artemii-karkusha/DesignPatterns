<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Builder;

use InvalidArgumentException;

interface PizzaInterface
{

    /**
     *
     * @return IngredientForPizzaInterface[]
     */
    public function getIngredients(): array;

    /**
     *
     * @param IngredientForPizzaInterface[] $ingredients
     * @return PizzaInterface
     * @throws InvalidArgumentException
     */
    public function setIngredients(array $ingredients): PizzaInterface;

    /**
     * @param IngredientForPizzaInterface $ingredientForPizza
     * @return PizzaInterface
     */
    public function addIngredient(IngredientForPizzaInterface $ingredientForPizza): PizzaInterface;
}
