<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\Decorator;

class PizzaWithSeafoodDecorator extends PizzaWithoutAnything
{
    /**
     * @inheritDoc
     */
    protected function getSelfIngredients(): string
    {
        return '(seafood)';
    }
}
