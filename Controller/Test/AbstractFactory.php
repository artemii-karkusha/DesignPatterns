<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use InvalidArgumentException;
use ArtemiiKarkusha\DesignPatterns\Api\FactoryMethod\FoodInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Service\AbstractFactory\KitchenAbstractFactory;

/**
 * Controller for test AbstractFactory functionality
 */
class AbstractFactory implements HttpGetActionInterface
{
    public const KITCHEN_LIST = ['ukrainian_kitchen', 'american_kitchen', 'japanese_kitchen'];

    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;

    /**
     * @var KitchenAbstractFactory
     */
    private KitchenAbstractFactory $kitchenAbstractFactory;

    /**
     * @param ResultFactory $resultFactory
     * @param KitchenAbstractFactory $kitchenAbstractFactory
     */
    public function __construct(ResultFactory $resultFactory, KitchenAbstractFactory $kitchenAbstractFactory)
    {
        $this->resultFactory = $resultFactory;
        $this->kitchenAbstractFactory = $kitchenAbstractFactory;
    }

    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        $foods = [];
        try {
            foreach (self::KITCHEN_LIST as $kitchenName) {
                $foods[$kitchenName] = $this->kitchenAbstractFactory->creatFoods($kitchenName);
            }
        } catch (InvalidArgumentException $invalidArgumentException) {
            throw new NotFoundException(__($invalidArgumentException->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)->setContents($this->getResponseText($foods));
    }

    /**
     * @param FoodInterface[] $foods
     * @return string
     */
    private function getResponseText(array $foods): string
    {
        $responseText = '';
        foreach ($foods as $kitchenName => $foodsFromKitchenFactory) {
            $responseText .= '<br>Kithcen name: "' . $kitchenName . '" products from kitchen';
            /** @var FoodInterface $food */
            foreach ($foodsFromKitchenFactory as $food) {
                $responseText .= ', ' . $food->getName();
            }
        }

        return $responseText;
    }
}
