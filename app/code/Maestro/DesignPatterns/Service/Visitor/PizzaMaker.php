<?php

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Visitor;

use Maestro\DesignPatterns\Api\Visitor\VisitorInterface;
use Maestro\DesignPatterns\Model\Builder\Bacon;
use Maestro\DesignPatterns\Model\Builder\Cheese;
use Maestro\DesignPatterns\Model\Builder\Pineapples;
use Maestro\DesignPatterns\Api\Builder\PizzaBuilderInterface;

class PizzaMaker implements VisitorInterface
{

    public function __construct(readonly private PizzaBuilderInterface $pizzaBuilder) {}

    /**
     * @inheritDoc
     */
    public function visitBacon(Bacon $bacon): void
    {
        $this->pizzaBuilder->addIngredient($bacon->getName());
    }

    /**
     * @inheritDoc
     */
    public function visitCheese(Cheese $cheese): void
    {
        $this->pizzaBuilder->addIngredient($cheese->getName());
    }

    /**
     * @inheritDoc
     */
    public function visitPineapple(Pineapples $pineapples): void
    {
        $this->pizzaBuilder->addIngredient($pineapples->getName());
    }
}
