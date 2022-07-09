<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Controller\Test;

use Maestro\DesignPatterns\Api\Decorator\Model\PizzaInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Maestro\DesignPatterns\Model\Decorator\PizzaWithoutAnything;
use Maestro\DesignPatterns\Model\Decorator\PizzaWithCheeseDecorator;
use Maestro\DesignPatterns\Model\Decorator\PizzaWithMushroomsDecorator;
use Maestro\DesignPatterns\Model\Decorator\PizzaWithPineapplesDecorator;
use Maestro\DesignPatterns\Model\Decorator\PizzaWithSeafoodDecorator;

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
