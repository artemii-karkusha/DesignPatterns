<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Interpreter;

use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;

interface PizzaRecipeInterpreterInterface
{
    /**
     * @param string $expression
     * @return PizzaInterface
     */
    public function makePizzaByExpression(string $expression): PizzaInterface;
}
