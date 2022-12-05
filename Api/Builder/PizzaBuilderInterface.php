<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Builder;

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
