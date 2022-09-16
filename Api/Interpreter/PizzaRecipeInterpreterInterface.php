<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Interpreter;

use Maestro\DesignPatterns\Api\Builder\PizzaInterface;

interface PizzaRecipeInterpreterInterface
{
    /**
     * @param string $expression
     * @return PizzaInterface
     */
    public function makePizzaByExpression(string $expression): PizzaInterface;
}
