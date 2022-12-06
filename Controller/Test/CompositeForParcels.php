<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use Magento\Framework\App\Action\HttpGetActionInterface;
use ArtemiiKarkusha\DesignPatterns\Api\CompositeForParcels\Service\ParcelManagementInterface;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Service\CompositeForParcels\ParcelManagement;
use Magento\Framework\Controller\ResultInterface;

class CompositeForParcels implements HttpGetActionInterface
{
    /**
     * @param ParcelManagementInterface $parcelManagement
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        public ParcelManagementInterface $parcelManagement,
        private ResultFactory $resultFactory
    ) {
    }

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)->setContents($this->getContents());
    }

    /**
     * @return string
     * @noinspection PhpDocMissingThrowsInspection
     */
    private function getContents(): string
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $containerOfParcel = $this->parcelManagement->getParcelById(ParcelManagement::EXAMPLE_PARCEL_UUID);
        return (string)$containerOfParcel->getWeight();
    }
}
