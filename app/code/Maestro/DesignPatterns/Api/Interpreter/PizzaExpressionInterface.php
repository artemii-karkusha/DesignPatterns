<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Interpreter;

use Maestro\DesignPatterns\Api\Builder\PizzaInterface;

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
