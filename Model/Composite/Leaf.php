<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\Composite;

use ArtemiiKarkusha\DesignPatterns\Api\Composite\ElementInterface;

class Leaf implements ElementInterface
{
    /**
     * @var int
     */
    private int $number = 0;

    /**
     * @inheritDoc
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @inheritDoc
     */
    public function increment(): void
    {
        $this->number++;
    }

    /**
     * @inheritDoc
     */
    public function decrement(): void
    {
        $this->number--;
    }

    /**
     * @inheritDoc
     */
    public function add(ElementInterface $element): void {}
}
