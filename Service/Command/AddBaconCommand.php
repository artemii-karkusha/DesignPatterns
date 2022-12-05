<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Command;

use ArtemiiKarkusha\DesignPatterns\Api\Command\Service\AddIngredientCommandInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\BaconFactory;

class AddBaconCommand implements AddIngredientCommandInterface
{
    /**
     * @var PizzaInterface
     */
    private PizzaInterface $pizza;

    /**
     * @var BaconFactory
     */
    private BaconFactory $baconFactory;

    /**
     * @param PizzaInterface $pizza
     * @param BaconFactory $baconFactory
     */
    public function __construct(
        PizzaInterface $pizza,
        BaconFactory $baconFactory
    ) {
        $this->pizza = $pizza;
        $this->baconFactory = $baconFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $this->pizza->addIngredient($this->baconFactory->create());
    }
}
