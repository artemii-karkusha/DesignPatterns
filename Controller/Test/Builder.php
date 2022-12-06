<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use InvalidArgumentException;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Api\Builder\PizzaBuilderInterface;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Cheese;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Bacon;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Pineapples;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Mushrooms;

/**
 * Controller for test Builder functionality
 */
class Builder implements HttpGetActionInterface
{
    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;

    /**
     * @var PizzaBuilderInterface
     */
    private PizzaBuilderInterface $pizzaBuilder;

    /**
     * @param ResultFactory $resultFactory
     * @param PizzaBuilderInterface $pizzaBuilder
     */
    public function __construct(ResultFactory $resultFactory, PizzaBuilderInterface $pizzaBuilder)
    {
        $this->resultFactory = $resultFactory;
        $this->pizzaBuilder = $pizzaBuilder;
    }

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        try {
            $this->pizzaBuilder
                ->addIngredient(Cheese::INGREDIENT_NAME)
                ->addIngredient(Bacon::INGREDIENT_NAME)
                ->addIngredient(Mushrooms::INGREDIENT_NAME)
                ->addIngredient(Pineapples::INGREDIENT_NAME);
        } catch (InvalidArgumentException $invalidArgumentException) {
            throw (new NotFoundException(__($invalidArgumentException->getMessage())));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)->setContents(
            $this->getResponseText($this->pizzaBuilder->getPizza())
        );
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

        $responseText = sprintf('<br>Pizza number"#%s"{', spl_object_id($pizza));
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
