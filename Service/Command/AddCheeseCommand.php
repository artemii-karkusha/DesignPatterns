<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Command;

use Maestro\DesignPatterns\Api\Command\Service\AddIngredientCommandInterface;
use Maestro\DesignPatterns\Api\Builder\PizzaInterface;
use Maestro\DesignPatterns\Model\Builder\CheeseFactory;

class AddCheeseCommand implements AddIngredientCommandInterface
{
    /**
     * @var PizzaInterface
     */
    private PizzaInterface $pizza;

    /**
     * @var CheeseFactory
     */
    private CheeseFactory $cheeseFactory;

    /**
     * @param PizzaInterface $pizza
     * @param CheeseFactory $cheeseFactory
     */
    public function __construct(
        PizzaInterface $pizza,
        CheeseFactory $cheeseFactory
    ) {
        $this->pizza = $pizza;
        $this->cheeseFactory = $cheeseFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $this->pizza->addIngredient($this->cheeseFactory->create());
    }
}
