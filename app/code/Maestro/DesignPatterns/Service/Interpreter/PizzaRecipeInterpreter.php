<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Interpreter;

use Maestro\DesignPatterns\Api\Builder\PizzaInterface;
use Maestro\DesignPatterns\Api\Interpreter\PizzaRecipeInterpreterInterface;
use Maestro\DesignPatterns\Api\Builder\PizzaInterfaceFactory;
use Maestro\DesignPatterns\Api\Interpreter\PizzaExpressionInterface;

class PizzaRecipeInterpreter implements PizzaRecipeInterpreterInterface
{

    /**
     * @param PizzaInterfaceFactory $pizzaFactory
     * @param PizzaExpressionInterface[] $pizzaExpressionsList
     */
    public function __construct(
        private PizzaInterfaceFactory $pizzaFactory,
        private array $pizzaExpressionsList = []
    ) {}

    /**
     * @inheritDoc
     */
    public function makePizzaByExpression(string $expression): PizzaInterface
    {
        $pizza = $this->pizzaFactory->create();
        foreach ($this->pizzaExpressionsList as $pizzaExpressions) {
            if (!$pizzaExpressions->isExpressionIsValid($expression)) {
                continue;
            }

            $pizzaExpressions->interpret($pizza, $expression);
        }

        return $pizza;
    }
}
