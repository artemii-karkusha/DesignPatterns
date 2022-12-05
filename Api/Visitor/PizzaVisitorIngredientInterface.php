<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Visitor;

interface PizzaVisitorIngredientInterface
{
    /**
     * @param VisitorInterface $visitor
     * @return string
     */
    public function accept(VisitorInterface $visitor): string;
}
