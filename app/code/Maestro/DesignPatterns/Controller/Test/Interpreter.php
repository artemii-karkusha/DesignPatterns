<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Controller\Test;

use Maestro\DesignPatterns\Api\Builder\PizzaInterface;
use Maestro\DesignPatterns\Api\Interpreter\PizzaRecipeInterpreterInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

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
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)->setContents($this->getContents());
    }

    /**
     * @return string
     * @noinspection PhpDocMissingThrowsInspection
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
