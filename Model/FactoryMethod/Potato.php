<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\FactoryMethod;

use ArtemiiKarkusha\DesignPatterns\Api\FactoryMethod\FoodInterface;

class Potato implements FoodInterface
{
    public const MEAT_NAME = 'potato';

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'potato';
    }
}
