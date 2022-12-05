<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\AbstractFactory;

use InvalidArgumentException;
use ArtemiiKarkusha\DesignPatterns\Api\AbstractFactory\FoodFactoryMethodForKitchenInterface;
use ArtemiiKarkusha\DesignPatterns\Api\FactoryMethod\FoodInterface;

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
