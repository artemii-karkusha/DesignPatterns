<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\Decorator;

use ArtemiiKarkusha\DesignPatterns\Api\Decorator\Model\PizzaInterface;

abstract class PizzaDecorator implements PizzaInterface
{
    /**
     * @param PizzaInterface $pizza
     */
    public function __construct(private PizzaInterface $pizza) {}

    /**
     * @inheritDoc
     */
    public function getIngredients(): string
    {
        return $this->pizza->getIngredients() . $this->getSelfIngredients();
    }

    /**
     * @return string
     */
    abstract protected function getSelfIngredients(): string;
}
