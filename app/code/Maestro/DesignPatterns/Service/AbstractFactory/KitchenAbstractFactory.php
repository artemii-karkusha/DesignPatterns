<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\AbstractFactory;

use InvalidArgumentException;
use Maestro\DesignPatterns\Api\AbstractFactory\FoodFactoryMethodForKitchenInterface;
use Maestro\DesignPatterns\Api\FactoryMethod\FoodInterface;

class KitchenAbstractFactory
{
    /**
     * @var array
     */
    private array $foodsFactoryForKitchens;

    /**
     * @param array $foodsFactoryForKitchens
     */
    public function __construct(array $foodsFactoryForKitchens = [])
    {
        $this->foodsFactoryForKitchens = $foodsFactoryForKitchens;
    }

    /**
     * Get all food by kitchen name
     *
     * @param string $kitchenName
     * @return FoodInterface[]
     */
    public function creatFoods(string $kitchenName): array
    {
        /** @var FoodFactoryMethodForKitchenInterface $foodsFactoryForKitchen */
        foreach ($this->foodsFactoryForKitchens as $foodsFactoryForKitchen) {
            if ($foodsFactoryForKitchen->getKitchenName() !== $kitchenName) {
                continue;
            }

            return $foodsFactoryForKitchen->createFoods();
        }

        throw new InvalidArgumentException((string)__('Kitchen %1 dones\'t exist', $kitchenName));
    }
}
