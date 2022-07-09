<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\CompositeForParcels;

use Maestro\DesignPatterns\Api\CompositeForParcels\Model\ContainerOfParcelInterface;
use Maestro\DesignPatterns\Api\CompositeForParcels\Model\ContainerTypesInterface;

class Box implements ContainerOfParcelInterface
{
    /**
     * @var ContainerOfParcelInterface[]
     */
    private array $parcels;

    /**
     * @param float $weight
     */
    public function __construct(private float $weight = 0.0) {}

    /**
     * @inheritDoc
     */
    private function getSelfWeight(): float
    {
        return $this->weight;
    }

    /**
     * @inheritDoc
     */
    public function getWeight(): float
    {
        $weight = $this->getSelfWeight();
        foreach ($this->parcels as $parcel) {
            $weight += $parcel->getWeight();
        }
        return round($weight, 2);
    }

    /**
     * @inheritDoc
     */
    public function getContainerType(): string
    {
        return ContainerTypesInterface::BOX;
    }

    /**
     * @inheritDoc
     */
    public function addParcelItem(ContainerOfParcelInterface $containerOfParcel): void
    {
        $this->parcels[] = $containerOfParcel;
    }
}
