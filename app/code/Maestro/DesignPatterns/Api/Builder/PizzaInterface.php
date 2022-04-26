<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Builder;

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
}
