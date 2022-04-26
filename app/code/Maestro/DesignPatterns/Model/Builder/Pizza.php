<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\Builder;

use InvalidArgumentException;
use Maestro\DesignPatterns\Api\Builder\IngredientForPizzaInterface;
use Maestro\DesignPatterns\Api\Builder\PizzaInterface;

class Pizza implements PizzaInterface
{
    /**
     * @var IngredientForPizzaInterface[]
     */
    private array $ingredient = [];

    /**
     * @inheritDoc
     */
    public function getIngredients(): array
    {
        return $this->ingredient;
    }

    /**
     * @inheritDoc
     */
    public function setIngredients(array $ingredients): PizzaInterface
    {
        foreach ($ingredients as $ingredient) {
            if ($ingredient instanceof IngredientForPizzaInterface) {
                continue;
            }
            throw new InvalidArgumentException(
                (string)__('Ingredient the %1 have incorrect type', $ingredient->getName())
            );
        }
        $this->ingredient = $ingredients;
        return $this;
    }
}
