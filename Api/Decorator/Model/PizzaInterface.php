<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Decorator\Model;

interface PizzaInterface
{
    /**
     * @return string
     */
    public function getIngredients(): string;
}
