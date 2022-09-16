<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\CompositeForParcels;

use Maestro\DesignPatterns\Api\CompositeForParcels\Model\ContainerOfParcelInterface;
use Maestro\DesignPatterns\Api\CompositeForParcels\Model\ContainerTypesInterface;

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
