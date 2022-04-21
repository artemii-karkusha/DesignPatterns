<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\AbstractFactory;

use Maestro\DesignPatterns\Api\FactoryMethod\FoodInterface;

class Cafe
{
    /**
     * @var KitchenAbstractFactory
     */
    private KitchenAbstractFactory $kitchenAbstractFactory;

    /**
     * @param KitchenAbstractFactory $kitchenAbstractFactory
     */
    public function __construct(KitchenAbstractFactory $kitchenAbstractFactory)
    {
        $this->kitchenAbstractFactory = $kitchenAbstractFactory;
    }

    /**
     * Get foods by kitchen name
     *
     * @param string $kitchenName
     * @return FoodInterface[]
     */
    public function cook(string $kitchenName): array
    {
        return $this->kitchenAbstractFactory->creatFoods($kitchenName);
    }
}
