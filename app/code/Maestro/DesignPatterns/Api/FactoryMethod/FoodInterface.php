<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\FactoryMethod;

interface FoodInterface
{
    /**
     * Get Food Name
     * @return string
     */
    public function getName(): string;
}
