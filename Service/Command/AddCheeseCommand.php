<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Command;

use ArtemiiKarkusha\DesignPatterns\Api\Command\Service\AddIngredientCommandInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\CheeseFactory;

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
