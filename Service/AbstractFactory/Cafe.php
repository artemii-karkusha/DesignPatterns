<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\AbstractFactory;

use ArtemiiKarkusha\DesignPatterns\Api\FactoryMethod\FoodInterface;

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
