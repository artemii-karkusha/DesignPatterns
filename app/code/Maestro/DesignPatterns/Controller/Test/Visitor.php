<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Controller\Test;

use Maestro\DesignPatterns\Api\Builder\PizzaInterface;
use Maestro\DesignPatterns\Model\Builder\Bacon;
use Maestro\DesignPatterns\Model\Builder\Cheese;
use Maestro\DesignPatterns\Model\Builder\Pineapples;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Maestro\DesignPatterns\Api\Visitor\VisitorInterface;
use Maestro\DesignPatterns\Api\Builder\PizzaBuilderInterface;

class Visitor implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     * @param VisitorInterface $visitorPizzaMaker
     * @param PizzaBuilderInterface $pizzaBuilder
     */
    public function __construct(
        readonly private ResultFactory $resultFactory,
        readonly private VisitorInterface $visitorPizzaMaker,
        readonly private PizzaBuilderInterface $pizzaBuilder
    ) {
    }

    /**
     * @inheritDoc
     * @noinspection PhpCSValidationInspection
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)->setContents($this->getContents());
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        $this->visitorPizzaMaker->visitPineapple(new Pineapples());
        $this->visitorPizzaMaker->visitCheese(new Cheese());
        $this->visitorPizzaMaker->visitBacon(new Bacon());
        $this->visitorPizzaMaker->visitBacon(new Bacon());
        return $this->getResponseText($this->pizzaBuilder->getPizza());
    }

    /**
     * @param PizzaInterface $pizza
     * @return string
     */
    private function getResponseText(PizzaInterface $pizza): string
    {
        if (count($pizza->getIngredients()) === 0) {
            return '';
        }

        $responseText = sprintf("<br>Pizza number\"#%s\"{", spl_object_id($pizza));
        foreach ($pizza->getIngredients() as $ingredient) {
            $responseText .= sprintf(
                "ingredient: \"%s\", ",
                $ingredient->getName(),
            );
        }
        $responseText .= '}';

        return $responseText;
    }
}
