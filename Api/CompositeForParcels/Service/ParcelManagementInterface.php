<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\CompositeForParcels\Service;

use ArtemiiKarkusha\DesignPatterns\Api\CompositeForParcels\Model\ContainerOfParcelInterface;
use Magento\Framework\Exception\NoSuchEntityException;

interface ParcelManagementInterface
{
    /**
     *
     * @param string $parcelUuid
     * @return ContainerOfParcelInterface
     * @throws NoSuchEntityException
     */
    public function getParcelById(string $parcelUuid): ContainerOfParcelInterface;
}
