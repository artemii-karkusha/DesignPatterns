<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\FactoryMethod;

use Maestro\DesignPatterns\Api\FactoryMethod\FoodInterface;

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
