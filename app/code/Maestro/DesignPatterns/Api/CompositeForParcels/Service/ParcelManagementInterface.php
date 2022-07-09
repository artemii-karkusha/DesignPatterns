<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\CompositeForParcels\Service;

use Maestro\DesignPatterns\Api\CompositeForParcels\Model\ContainerOfParcelInterface;
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
