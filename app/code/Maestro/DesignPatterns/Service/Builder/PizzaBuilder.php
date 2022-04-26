<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

namespace Maestro\DesignPatterns\Service\Builder;

use InvalidArgumentException;
use Maestro\DesignPatterns\Api\Builder\PizzaBuilderInterface;
use Maestro\DesignPatterns\Api\Builder\PizzaInterface;
use Maestro\DesignPatterns\Api\Builder\PizzaIngredientFactoryMethodInterface;
use Maestro\DesignPatterns\Api\Builder\PizzaInterfaceFactory;

class PizzaBuilder implements PizzaBuilderInterface
{
    /**
     * @var array
     */
    private array $ingredients = [];

    /**
     * @var PizzaIngredientFactoryMethodInterface
     */
    private PizzaIngredientFactoryMethodInterface $ingredientFactoryMethod;

    /**
     * @var PizzaInterfaceFactory
     */
    private PizzaInterfaceFactory $pizzaFactory;

    /**
     * @param PizzaIngredientFactoryMethodInterface $ingredientFactoryMethod
     * @param PizzaInterfaceFactory $pizzaFactory
     */
    public function __construct(
        PizzaIngredientFactoryMethodInterface $ingredientFactoryMethod,
        PizzaInterfaceFactory $pizzaFactory
    ) {
        $this->ingredientFactoryMethod = $ingredientFactoryMethod;
        $this->pizzaFactory = $pizzaFactory;
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
