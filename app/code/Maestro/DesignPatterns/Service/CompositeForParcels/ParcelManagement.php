<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\CompositeForParcels;

use Maestro\DesignPatterns\Api\CompositeForParcels\Model\ContainerOfParcelInterface;
use Maestro\DesignPatterns\Api\CompositeForParcels\Model\ContainerTypesInterface;
use Maestro\DesignPatterns\Api\CompositeForParcels\Service\ParcelManagementInterface;
use Maestro\DesignPatterns\Model\CompositeForParcels\BoxFactory;
use Maestro\DesignPatterns\Model\CompositeForParcels\ParcelItemFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class ParcelManagement implements ParcelManagementInterface
{
    public const EXAMPLE_PARCEL_UUID = '123123ad21-asd123dc-wad12ea-sd21easd';

    private const PARCELS = [
        self::EXAMPLE_PARCEL_UUID => [
            'weight' => 0.1,
            'type' => ContainerTypesInterface::BOX,
            'parcelItems' => [
                [
                    'weight' => 0.1,
                    'type' => ContainerTypesInterface::BOX,
                    'parcelItems' => [
                        [
                            'weight' => 0.2,
                            'type' => ContainerTypesInterface::PARCEL_ITEM,
                        ],
                        [
                            'weight' => 0.23,
                            'type' => ContainerTypesInterface::PARCEL_ITEM,
                        ],
                        [
                            'weight' => 0.23,
                            'type' => ContainerTypesInterface::PARCEL_ITEM,
                        ]
                    ]
                ],
                [
                    'weight' => 0.1,
                    'type' => ContainerTypesInterface::BOX,
                    'parcelItems' => [
                        [
                            'weight' => 0.26,
                            'type' => ContainerTypesInterface::PARCEL_ITEM,
                        ],
                        [
                            'weight' => 0.27,
                            'type' => ContainerTypesInterface::PARCEL_ITEM,
                        ],
                        [
                            'weight' => 0.28,
                            'type' => ContainerTypesInterface::PARCEL_ITEM,
                        ]
                    ]
                ],
                [
                    'weight' => 0.1,
                    'type' => ContainerTypesInterface::BOX,
                    'parcelItems' => [
                        [
                            'weight' => 0.21,
                            'type' => ContainerTypesInterface::PARCEL_ITEM,
                        ],
                        [
                            'weight' => 0.24,
                            'type' => ContainerTypesInterface::PARCEL_ITEM,
                        ],
                        [
                            'weight' => 0.29,
                            'type' => ContainerTypesInterface::PARCEL_ITEM,
                        ]
                    ]
                ]
            ]
        ]
    ];

    /**
     * @param BoxFactory $boxFactory
     * @param ParcelItemFactory $parcelItemFactory
     */
    public function __construct(
        private BoxFactory $boxFactory,
        private ParcelItemFactory $parcelItemFactory
    ) {
    }

    /**
     * @inheritDoc
     */
    public function getParcelById(string $parcelUuid): ContainerOfParcelInterface
    {
        if (!isset(self::PARCELS[$parcelUuid])) {
            throw new NoSuchEntityException(__('Parcel %1 doesn\'t exist', $parcelUuid));
        }

        return $this->buildParcel(self::PARCELS[$parcelUuid]);
    }

    /**
     * @param array $parcelData
     * @return ContainerOfParcelInterface
     */
    private function buildParcel(array $parcelData): ContainerOfParcelInterface
    {
        if ($parcelData['type'] === ContainerTypesInterface::PARCEL_ITEM) {
            return $this->parcelItemFactory->create(['weight' => $parcelData['weight']]);
        }

        $containerOfParcel = $this->boxFactory->create(['weight' => $parcelData['weight']]);
        /** @var ContainerOfParcelInterface $container */
        foreach ($parcelData['parcelItems'] ?? [] as $parcels) {
            $containerOfParcel->addParcelItem($this->buildParcel($parcels));
        }

        return $containerOfParcel;
    }
}
