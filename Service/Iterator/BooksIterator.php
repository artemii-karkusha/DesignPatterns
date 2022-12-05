<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Iterator;

use Iterator;
use ArtemiiKarkusha\DesignPatterns\Model\Iterator\CollectionOfBooks;
use ArtemiiKarkusha\DesignPatterns\Api\Iterator\Model\BookInterface;

class BooksIterator implements Iterator
{
    public const ITERATOR_NAME = 'books_iterator';

    /**
     * @var BookInterface[]
     */
    private array $books;

    /**
     * @var int
     */
    private int $currentBookIndex = 0;

    /**
     * @param CollectionOfBooks $collectionOfBooks
     */
    public function __construct(CollectionOfBooks $collectionOfBooks)
    {
        $this->books = $collectionOfBooks->getItems();
    }

    /**
     * @return BookInterface
     */
    public function current(): BookInterface
    {
        return $this->books[$this->currentBookIndex];
    }

    /**
     * @return void
     */
    public function next(): void
    {
        ++$this->currentBookIndex;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->currentBookIndex;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->books[$this->currentBookIndex]);
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->currentBookIndex = 0;
    }
}
