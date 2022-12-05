<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Iterator;

use Iterator;
use ArtemiiKarkusha\DesignPatterns\Model\Iterator\CollectionOfBooks;
use ArtemiiKarkusha\DesignPatterns\Api\Iterator\Model\BookInterface;

class BooksSortedByAuthorNameIterator implements Iterator
{
    public const ITERATOR_NAME = 'books_sorted_by_author_name_iterator';

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
        $this->books = $this->getSortedBooks($collectionOfBooks);
    }

    /**
     * @param CollectionOfBooks $collectionOfBooks
     * @return BookInterface[]
     */
    private function getSortedBooks(CollectionOfBooks $collectionOfBooks): array
    {
        $sortedBooks = $collectionOfBooks->getItems();
        usort($sortedBooks, function (BookInterface $book1, BookInterface $book2) {
            return strcmp($book1->getAuthorName(), $book2->getAuthorName());
        });

        return $sortedBooks;
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
