<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Builder;

interface IngredientForPizzaInterface
{
    /**
     *
     * @return string
     */
    public function getName(): string;
}
