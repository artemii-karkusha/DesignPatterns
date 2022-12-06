<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Interpreter\PizzaRecipeInterpreterInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Interpreter implements HttpGetActionInterface
{
    /**
     * @param PizzaRecipeInterpreterInterface $pizzaRecipeInterpreter
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        public PizzaRecipeInterpreterInterface $pizzaRecipeInterpreter,
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
     */
    private function getContents(): string
    {
        $expression = 'Add_boom:{123,123,123};Add_ingredient:{bacon,cheese};';
        $pizzaWithBaconAndCheese = $this->pizzaRecipeInterpreter->makePizzaByExpression($expression);
        return sprintf(
            'Pizza ingredients: %s. Pizza objectId : %s',
            $this->convertPizzaIngratesToString($pizzaWithBaconAndCheese),
            spl_object_id($pizzaWithBaconAndCheese),
        );
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
