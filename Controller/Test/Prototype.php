<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use InvalidArgumentException;
use ArtemiiKarkusha\DesignPatterns\Api\Prototype\CarInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Service\Prototype\CarPrototype;

/**
 * Controller for test Prototype functionality
 */
class Prototype implements HttpGetActionInterface
{
    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;

    /**
     * @var CarPrototype
     */
    private CarPrototype $carPrototype;

    /**
     * @param ResultFactory $resultFactory
     * @param CarPrototype $carPrototype
     */
    public function __construct(ResultFactory $resultFactory, CarPrototype $carPrototype)
    {
        $this->resultFactory = $resultFactory;
        $this->carPrototype = $carPrototype;
    }

    /**
     * Execute action based on request and return result
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {

        try {
            $passengerCarNumber = '123456pc';
            $truckCarNumber = '123456truck';
            $minivanNumber = '123456minivan';
            $color = 'black';
            $cars [] = $this->carPrototype->createPassengerCar($color, $passengerCarNumber);
            $cars [] = $this->carPrototype->createTruck($color, $truckCarNumber);
            $cars [] = $this->carPrototype->createMinivan($color, $minivanNumber);
        } catch (InvalidArgumentException $invalidArgumentException) {
            throw new NotFoundException(__($invalidArgumentException->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)->setContents($this->getResponseText($cars));
    }

    /**
     * @param CarInterface[] $cars
     * @return string
     */
    private function getResponseText(array $cars): string
    {
        $responseText = '';
        foreach ($cars as $car) {
            $responseText .= sprintf(
                "<br>Car data number\"#%s\"{ car type: \"%s\", car number :%s\", car color :%s\"}",
                spl_object_id($car),
                $car->getTypeCar(),
                $car->getNumber(),
                $car->getColor()
            );
        }

        return $responseText;
    }
}
