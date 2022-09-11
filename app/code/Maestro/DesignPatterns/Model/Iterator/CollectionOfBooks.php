<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\Iterator;

use Iterator;
use Maestro\DesignPatterns\Api\Iterator\Model\IterableCollection;
use Maestro\DesignPatterns\Api\Iterator\Model\BookInterface;
use Maestro\DesignPatterns\Service\Iterator\IteratorFactoryMethod;

class CollectionOfBooks implements IterableCollection
{
    /**
     * @var BookInterface[]
     */
    private array $books;

    /**
     * @param IteratorFactoryMethod $iteratorFactory
     */
    public function __construct(private IteratorFactoryMethod $iteratorFactory) {}

    /**
     * @return BookInterface[]
     */
    public function getItems(): array
    {
        return $this->books;
    }

    /**
     * @param BookInterface $book
     * @return IterableCollection
     */
    public function addItem(BookInterface $book): CollectionOfBooks
    {
        $this->books[] = $book;
        return $this;
    }
    /**
     * @inheritDoc
     */
    public function createIterator(string $iteratorName): Iterator
    {
        return $this->iteratorFactory->createIterator($this, $iteratorName);
    }
}
