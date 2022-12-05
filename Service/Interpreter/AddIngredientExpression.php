<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Interpreter;

use ArtemiiKarkusha\DesignPatterns\Api\Builder\IngredientForPizzaInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Command\Service\PizzaCookerInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Interpreter\PizzaExpressionInterface;

class AddIngredientExpression implements PizzaExpressionInterface
{
    private const ADD_INGREDIENT_EXPRESSION = 'Add_ingredient:';

    private const SEPARATOR_INGREDIENT_EXPRESSION = ',';

    private const START_SEPARATOR_INGREDIENT_EXPRESSION = '{';

    private const FINISH_SEPARATOR_INGREDIENT_EXPRESSION = '}';

    /**
     * @param PizzaCookerInterface $pizzaCooker
     */
    public function __construct(
        private PizzaCookerInterface $pizzaCooker
    ) {}

    /**
     * @inheritDoc
     */
    public function interpret(PizzaInterface $pizza, string $expression): void
    {
        $pizza->setIngredients($this->getIngredientsFromExpression($expression));
    }

    /**
     * @inheritDoc
     */
    public function isExpressionIsValid(string $expression): bool
    {
        return str_contains($expression, self::ADD_INGREDIENT_EXPRESSION);
    }

    /**
     * @param string $expression
     * @return IngredientForPizzaInterface[]
     */
    private function getIngredientsFromExpression(string $expression): array
    {
        foreach ($this->getIngredientsNamesFromExpression($expression) as $ingredientName) {
            $this->pizzaCooker->addIngredientByName($ingredientName);
        }
        return $this->pizzaCooker->makePizza()->getIngredients();
    }

    /**
     * @param string $expression
     * @return string[]
     */
    private function getIngredientsNamesFromExpression(string $expression): array
    {
        return explode(
            self::SEPARATOR_INGREDIENT_EXPRESSION,
            $this->cutExpressionAndLeftOnlyIngredients($expression)
        );
    }

    /**
     * @param string $expression
     * @return string
     */
    private function cutExpressionAndLeftOnlyIngredients(string $expression): string
    {
        return $this->cutAllExceptOfIngredients(
            $this->getExpressionForCurrentContext($expression)
        );
    }

    /**
     * @param string $expression
     * @return string
     */
    private function getExpressionForCurrentContext(string $expression): string
    {
        $expressions = explode(self::EXPRESSION_SEPARATOR, $expression);
        foreach ($expressions as $expressionKey => $expression) {
            if(!str_contains($expression, self::ADD_INGREDIENT_EXPRESSION)){
                continue;
            }

            return $expressions[$expressionKey];
        }

        return '';
    }

    /**
     * @param string $expressionForCurrentContext
     * @return string
     */
    private function cutAllExceptOfIngredients(string $expressionForCurrentContext): string
    {
        $positionWhereIngredientsStart = stripos(
            $expressionForCurrentContext,
            self::START_SEPARATOR_INGREDIENT_EXPRESSION
        );
        $positionWhereIngredientsFinish = stripos(
            $expressionForCurrentContext,
            self::FINISH_SEPARATOR_INGREDIENT_EXPRESSION
        );
        return mb_substr(
            $expressionForCurrentContext,
            $positionWhereIngredientsStart + 1,
            $positionWhereIngredientsFinish - $positionWhereIngredientsStart - 1,
        );
    }
}
