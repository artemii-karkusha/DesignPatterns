<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\CompositeForParcels\Model;

interface ContainerOfParcelInterface
{
    /**
     * @return float
     */
    public function getWeight(): float;

    /**
     * @return string
     */
    public function getContainerType(): string;

    /**
     * @param ContainerOfParcelInterface $containerOfParcel
     * @return void
     */
    public function addParcelItem(ContainerOfParcelInterface $containerOfParcel): void;
}
