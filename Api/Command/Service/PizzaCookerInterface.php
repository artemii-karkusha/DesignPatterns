<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Command\Service;

use Maestro\DesignPatterns\Api\Builder\PizzaInterface;
use Magento\Framework\Exception\NotFoundException;

interface PizzaCookerInterface
{
    /**
     * @param string $ingredientName
     * @return PizzaCookerInterface
     * @throws NotFoundException
     */
    public function addIngredientByName(string $ingredientName): PizzaCookerInterface;

    /**
     * @return PizzaInterface
     */
    public function makePizza(): PizzaInterface;
}
