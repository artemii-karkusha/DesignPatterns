<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use ArtemiiKarkusha\DesignPatterns\Api\Decorator\Model\PizzaInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Model\Decorator\PizzaWithoutAnything;
use ArtemiiKarkusha\DesignPatterns\Model\Decorator\PizzaWithCheeseDecorator;
use ArtemiiKarkusha\DesignPatterns\Model\Decorator\PizzaWithMushroomsDecorator;
use ArtemiiKarkusha\DesignPatterns\Model\Decorator\PizzaWithPineapplesDecorator;
use ArtemiiKarkusha\DesignPatterns\Model\Decorator\PizzaWithSeafoodDecorator;

class Decorator implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        private ResultFactory $resultFactory,
    ) {}

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

        /** @var PizzaInterface $pizza */
        $pizza = new PizzaWithoutAnything(
            new PizzaWithCheeseDecorator(
                new PizzaWithPineapplesDecorator(
                    new PizzaWithMushroomsDecorator()
                )
            )
        );
        return $pizza->getIngredients();
    }
}
