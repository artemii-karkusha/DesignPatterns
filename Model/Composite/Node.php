<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\Composite;

use ArtemiiKarkusha\DesignPatterns\Api\Composite\ElementInterface;

class Node implements ElementInterface
{
    /**
     * @var ElementInterface[]
     */
    private array $elements;

    /**
     * @inheritDoc
     */
    public function getNumber(): int
    {
        $number = 0;
        foreach ($this->elements as $element) {
            $number += $element->getNumber();
        }
        return $number;
    }

    /**
     * @inheritDoc
     */
    public function increment(): void
    {
        foreach ($this->elements as $element) {
            $element->increment();
        }
    }

    /**
     * @inheritDoc
     */
    public function decrement(): void
    {
        foreach ($this->elements as $element) {
            $element->decrement();
        }
    }

    /**
     * @inheritDoc
     */
    public function add(ElementInterface $element): void
    {
        $this->elements[] = $element;
    }
}
