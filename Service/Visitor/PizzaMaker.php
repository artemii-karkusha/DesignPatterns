<?php

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Visitor;

use ArtemiiKarkusha\DesignPatterns\Api\Visitor\VisitorInterface;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Bacon;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Cheese;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Pineapples;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaBuilderInterface;

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
