<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\Builder;

use Maestro\DesignPatterns\Api\Visitor\PizzaVisitorIngredientInterface;
use Maestro\DesignPatterns\Api\Visitor\VisitorInterface;

class Cheese extends Ingredient implements PizzaVisitorIngredientInterface
{
    public const INGREDIENT_NAME = 'cheese';

    /**
     * @param VisitorInterface $visitor
     * @return string
     */
    public function accept(VisitorInterface $visitor): string
    {
        return $visitor->visitCheese($this);
    }
}
