<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\Composite;

use Maestro\DesignPatterns\Api\Composite\ElementInterface;

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
