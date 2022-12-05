<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\FactoryMethod;

interface FoodInterface
{
    /**
     * Get Food Name
     * @return string
     */
    public function getName(): string;
}
