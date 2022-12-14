<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use Exception;
use ArtemiiKarkusha\DesignPatterns\Api\State\Model\OvenInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Api\State\Model\OvenInterfaceFactory;
use Magento\Framework\Controller\ResultInterface;

class State implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     * @param OvenInterfaceFactory $ovenFactory
     */
    public function __construct(
        readonly private ResultFactory $resultFactory,
        readonly private OvenInterfaceFactory $ovenFactory
    ) {
    }

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        $this->getContents();
        return $this->resultFactory->create(ResultFactory::TYPE_RAW);
    }

    /**
     * @return void
     */
    public function getContents(): void
    {
        /** @var OvenInterface $oven */
        $oven = $this->ovenFactory->create(); // State is Cold
        try {
            echo 'Oven is trying to bake. <br>';
            echo 'State is Cold <br>';
            $oven->bake();
        } catch (Exception $exception) {
            echo $exception->getMessage() . '<br>';
        }

        try {
            echo 'Oven is trying to warm. <br>';
            $oven->warm();
            echo 'State is ReadyToWork <br>';
            echo 'Oven is trying to bake. <br>';
            $oven->bake();
            echo 'Oven is trying to bake. <br>';
            $oven->bake();
            $oven->warm();
            echo 'State is Hot<br>';
            $oven->warm();
            $oven->warm();
            echo 'Oven is trying to bake. <br>';
            $oven->bake();
        } catch (Exception $exception) {
            echo $exception->getMessage() . '<br>';
        }
    }
}
