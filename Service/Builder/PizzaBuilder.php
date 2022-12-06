<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Builder;

use InvalidArgumentException;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaBuilderInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaIngredientFactoryMethodInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterfaceFactory;

class PizzaBuilder implements PizzaBuilderInterface
{
    /**
     * @var array
     */
    private array $ingredients = [];

    /**
     * @param PizzaIngredientFactoryMethodInterface $ingredientFactoryMethod
     * @param PizzaInterfaceFactory $pizzaFactory
     */
    public function __construct(
        private PizzaIngredientFactoryMethodInterface $ingredientFactoryMethod,
        private PizzaInterfaceFactory $pizzaFactory
    ) {
    }

    /**
     * @inheritDoc
     */
    public function addIngredient(string $ingredient): PizzaBuilderInterface
    {
        $this->ingredients[] = $this->ingredientFactoryMethod->createIngredient($ingredient);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPizza(): PizzaInterface
    {
        return $this->pizzaFactory->create()->setIngredients($this->ingredients);
    }
}
