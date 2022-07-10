<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Decorator\Model;

interface PizzaInterface
{
    /**
     * @return string
     */
    public function getIngredients(): string;
}
