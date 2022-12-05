<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Api\Mediator\ConciergeServiceInterface;
use Magento\Framework\Exception\NotFoundException;

class Mediator implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     * @param ConciergeServiceInterface $conciergeService
     */
    public function __construct(
        private ResultFactory $resultFactory,
        private ConciergeServiceInterface $conciergeService
    ) {
    }

    /**
     * @inheritDoc
     * @noinspection PhpCSValidationInspection
     */
    public function execute()
    {
        $this->getContents();
        return $this->resultFactory->create(ResultFactory::TYPE_RAW);
    }

    /**
     * @return void
     */
    public function getContents(): void
    {
        $this->conciergeService->executeRequestByName('CallATaxi');
        $this->conciergeService->executeRequestByName('CallAMaster');
        $this->conciergeService->executeRequestByName('DeliveryAFlower');
        try {
            $this->conciergeService->executeRequestByName('DeliveryAFlowerBluBluBlu');
        } catch (NotFoundException $notFoundException) {
            echo sprintf("%s<br>", $notFoundException->getMessage());
        }
    }
}
