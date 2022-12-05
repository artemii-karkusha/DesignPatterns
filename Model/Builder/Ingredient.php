<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\Builder;

abstract class Ingredient implements \ArtemiiKarkusha\DesignPatterns\Api\Builder\IngredientForPizzaInterface
{
    public const INGREDIENT_NAME = '';

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return static::INGREDIENT_NAME;
    }
}
