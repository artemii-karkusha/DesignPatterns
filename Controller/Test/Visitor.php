<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Bacon;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Cheese;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Pineapples;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Api\Visitor\VisitorInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaBuilderInterface;
use Magento\Framework\Controller\ResultInterface;

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
     */
    public function execute(): ResultInterface
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
                'ingredient: "%s", ',
                $ingredient->getName(),
            );
        }
        $responseText .= '}';

        return $responseText;
    }
}
