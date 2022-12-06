<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Command;

use ArtemiiKarkusha\DesignPatterns\Api\Builder\IngredientForPizzaInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Command\Service\PizzaCookerInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterfaceFactory;
use ArtemiiKarkusha\DesignPatterns\Api\Command\Service\AddIngredientCommandInterface;
use ArtemiiKarkusha\Framework\Exception\NotFoundException;

class PizzaCooker implements PizzaCookerInterface
{
    /**
     * @var AddIngredientCommandInterface[]
     */
    private array $pizzaCommandsList;

    /**
     * @var PizzaInterface
     */
    private PizzaInterface $pizza;

    /**
     * @param PizzaInterfaceFactory $pizzaFactory
     * @param array $pizzaCommandsFactoryList
     */
    public function __construct(
        PizzaInterfaceFactory $pizzaFactory,
        array $pizzaCommandsFactoryList
    ) {
        $this->pizza = $pizzaFactory->create();
        $this->buildPizzaCommands($pizzaCommandsFactoryList);
    }

    /**
     * @inheritDoc
     */
    public function addIngredientByName(string $ingredientName): PizzaCookerInterface
    {
        $this->getIngredientCommand($ingredientName)->execute();
        return $this;
    }

    /**
     * @param string $ingredientName
     * @return AddIngredientCommandInterface
     * @throws NotFoundException
     */
    private function getIngredientCommand(string $ingredientName): AddIngredientCommandInterface
    {
        if (!isset($this->pizzaCommandsList[$ingredientName])) {
            throw new NotFoundException(__('Ingredient don\'t exist'));
        }

        return $this->pizzaCommandsList[$ingredientName];
    }

    /**
     * @inheritDoc
     */
    public function makePizza(): PizzaInterface
    {
        return $this->pizza;
    }

    /**
     * @param array $pizzaCommandFactories
     * @return void
     */
    private function buildPizzaCommands(array $pizzaCommandFactories): void
    {
        foreach ($pizzaCommandFactories as $ingredientName => $ingredientFactory) {
            $this->pizzaCommandsList[$ingredientName] = $ingredientFactory->create(['pizza' => $this->pizza]);
        }
    }
}
