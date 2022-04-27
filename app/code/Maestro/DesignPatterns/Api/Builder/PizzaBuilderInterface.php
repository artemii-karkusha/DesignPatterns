<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Builder;

use InvalidArgumentException;

interface PizzaBuilderInterface
{
    /**
     *
     * @param string $ingredient
     * @return PizzaBuilderInterface
     * @throws InvalidArgumentException
     */
    public function addIngredient(string $ingredient): PizzaBuilderInterface;

    /**
     *
     * @return PizzaInterface
     */
    public function getPizza(): PizzaInterface;
}
