<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Command\Service;

use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;
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
