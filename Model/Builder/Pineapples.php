<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\Builder;

use ArtemiiKarkusha\DesignPatterns\Api\Visitor\PizzaVisitorIngredientInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Visitor\VisitorInterface;

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
