<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Command;

use Maestro\DesignPatterns\Api\Command\Service\AddIngredientCommandInterface;
use Maestro\DesignPatterns\Api\Builder\PizzaInterface;
use Maestro\DesignPatterns\Model\Builder\BaconFactory;

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
