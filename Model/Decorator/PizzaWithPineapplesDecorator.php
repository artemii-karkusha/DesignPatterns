<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\Decorator;

class PizzaWithPineapplesDecorator extends PizzaWithoutAnything
{
    /**
     * @inheritDoc
     */
    protected function getSelfIngredients(): string
    {
        return '(pineapples)';
    }
}
