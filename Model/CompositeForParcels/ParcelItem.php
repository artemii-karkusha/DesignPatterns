<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\CompositeForParcels;

use ArtemiiKarkusha\DesignPatterns\Api\CompositeForParcels\Model\ContainerOfParcelInterface;
use ArtemiiKarkusha\DesignPatterns\Api\CompositeForParcels\Model\ContainerTypesInterface;

class ParcelItem implements ContainerOfParcelInterface
{
    /**
     * @param float $weight
     */
    public function __construct(private float $weight = 0.0) {}

    /**
     * @inheritDoc
     */
    public function getWeight(): float
    {
        return round($this->weight, 2);
    }

    /**
     * @inheritDoc
     */
    public function getContainerType(): string
    {
        return ContainerTypesInterface::PARCEL_ITEM;
    }

    /**
     * @inheritDoc
     */
    public function addParcelItem(ContainerOfParcelInterface $containerOfParcel): void {}
}
