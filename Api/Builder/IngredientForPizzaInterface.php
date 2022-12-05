<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Builder;

interface IngredientForPizzaInterface
{
    /**
     *
     * @return string
     */
    public function getName(): string;
}
