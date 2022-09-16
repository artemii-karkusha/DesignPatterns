<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\Builder;

use Maestro\DesignPatterns\Api\Visitor\PizzaVisitorIngredientInterface;
use Maestro\DesignPatterns\Api\Visitor\VisitorInterface;

class Pineapples extends Ingredient implements PizzaVisitorIngredientInterface
{
    public const INGREDIENT_NAME = 'pineapples';

    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor): string
    {
        return $visitor->visitPineapple($this);
    }
}
