<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\Decorator;

use Maestro\DesignPatterns\Api\Decorator\Model\PizzaInterface;

class PizzaWithoutAnything implements PizzaInterface
{
    /**
     * @param PizzaInterface|null $pizza
     */
    public function __construct(private ?PizzaInterface $pizza = null) {}

    /**
     * @inheritDoc
     */
    public function getIngredients(): string
    {
        if (!$this->pizza) {
            return $this->getSelfIngredients();
        }

        return $this->pizza->getIngredients() . $this->getSelfIngredients();
    }

    /**
     * @return string
     */
    protected function getSelfIngredients(): string
    {
        return '';
    }
}
