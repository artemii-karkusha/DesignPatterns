<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Command\Service\PizzaCookerInterface;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Bacon;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Cheese;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;

class Command implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     * @param PizzaCookerInterface $pizzaCooker
     */
    public function __construct(
        private ResultFactory $resultFactory,
        private PizzaCookerInterface $pizzaCooker
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
        try {
            $pizzaWithBaconAndCheese = $this->pizzaCooker
                ->addIngredientByName(Bacon::INGREDIENT_NAME)
                ->addIngredientByName(Cheese::INGREDIENT_NAME)
                ->makePizza();
            return sprintf(
                "Pizza ingredients: %s. Pizza objectId : %s",
                $this->convertPizzaIngratesToString($pizzaWithBaconAndCheese),
                spl_object_id($pizzaWithBaconAndCheese),
            );
        } catch (NotFoundException $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @param PizzaInterface $pizza
     * @return string
     */
    private function convertPizzaIngratesToString(PizzaInterface $pizza): string
    {
        $ingredientsHowString = '';
        foreach ($pizza->getIngredients() as $ingredient) {
            $ingredientsHowString .= $ingredient->getName() . ',';
        }
        return $ingredientsHowString;
    }
}
