<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Interpreter;

use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;

interface PizzaExpressionInterface
{
    public const EXPRESSION_SEPARATOR = ';';

    /**
     * @param PizzaInterface $pizza
     * @param string $expression
     * @return void
     */
    public function interpret(PizzaInterface $pizza, string $expression): void;

    /**
     * @param string $expression
     * @return bool
     */
    public function isExpressionIsValid(string $expression): bool;
}
