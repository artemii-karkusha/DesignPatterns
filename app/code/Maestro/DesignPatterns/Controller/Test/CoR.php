<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Controller\Test;


use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Maestro\DesignPatterns\Api\CoR\Service\EmergencyServicesManagerInterface;
use Maestro\DesignPatterns\Api\CoR\Model\PhoneInterfaceFactory;
use Maestro\DesignPatterns\Api\CoR\Model\PhoneInterface;
use Maestro\DesignPatterns\Service\CoR\FireDepartmentCallerService;
use Maestro\DesignPatterns\Service\CoR\MedicalServiceCaller;
use Maestro\DesignPatterns\Service\CoR\PoliceDepartmentCallerService;

class CoR implements HttpGetActionInterface
{

    public const SERVICE_PHONE_NUMBER_WHICH_NOT_EXIST = '248';

    /**
     * @param ResultFactory $resultFactory
     * @param EmergencyServicesManagerInterface $emergencyServicesManager
     * @param PhoneInterfaceFactory $phoneInterfaceFactory
     */
    public function __construct(
        private ResultFactory $resultFactory,
        private EmergencyServicesManagerInterface $emergencyServicesManager,
        private PhoneInterfaceFactory $phoneInterfaceFactory
    ) {
    }

    /**
     * @inheritDoc
     * @noinspection PhpCSValidationInspection
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)
            ->setContents($this->getContents());
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        /** @var PhoneInterface $phone */
        $phone = $this->phoneInterfaceFactory->create();
        $this->emergencyServicesManager->call(
            $phone->setNumber(FireDepartmentCallerService::EMERGENCY_SERVICE_PHONE_NUMBER)
        );
        $this->emergencyServicesManager->call(
            $phone->setNumber(MedicalServiceCaller::EMERGENCY_SERVICE_PHONE_NUMBER)
        );
        $this->emergencyServicesManager->call(
            $phone->setNumber(PoliceDepartmentCallerService::EMERGENCY_SERVICE_PHONE_NUMBER)
        );
        $this->emergencyServicesManager->call(
            $phone->setNumber(self::SERVICE_PHONE_NUMBER_WHICH_NOT_EXIST)
        );

        return '';
    }
}
