<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use ArtemiiKarkusha\DesignPatterns\Api\Iterator\Model\BookInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Model\Iterator\CollectionOfBooks;
use ArtemiiKarkusha\DesignPatterns\Service\Iterator\BooksSortedByAuthorNameIterator;
use ArtemiiKarkusha\DesignPatterns\Service\Iterator\BooksSortedByBookNameIterator;
use ArtemiiKarkusha\DesignPatterns\Api\Iterator\Model\BookInterfaceFactory;

class Iterator implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     * @param CollectionOfBooks $collectionOfBooks
     * @param BookInterfaceFactory $bookInterfaceFactory
     */
    public function __construct(
        private ResultFactory $resultFactory,
        private CollectionOfBooks $collectionOfBooks,
        private BookInterfaceFactory $bookInterfaceFactory
    ) {
    }

    /**
     * @inheritDoc
     * @noinspection PhpCSValidationInspection
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)
            ->setContents($this->getContents());
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
       $book1 = $this->bookInterfaceFactory->create([
           'name' => '1Title',
           'authorName' => '2Author',
           'yearOfPublishing' => '1995'
       ]);
        $book2 = $this->bookInterfaceFactory->create([
            'name' => '2Title',
            'authorName' => '3Author',
            'yearOfPublishing' => '1996'
        ]);
        $book3 = $this->bookInterfaceFactory->create([
            'name' => '3Title',
            'authorName' => '1Author',
            'yearOfPublishing' => '1992'
        ]);

        $this->collectionOfBooks->addItem($book3)
            ->addItem($book2)
            ->addItem($book1);

        $booksSortedByAuthorName = [];
        /** @var BookInterface $bookItem */
        foreach ($this->collectionOfBooks->createIterator(BooksSortedByAuthorNameIterator::ITERATOR_NAME) as
                 $bookItem)
        {
            $booksSortedByAuthorName[] = $bookItem;
        }

        $booksSortedByBookName = [];
        /** @var BookInterface $bookItem */
        foreach ($this->collectionOfBooks->createIterator(BooksSortedByBookNameIterator::ITERATOR_NAME) as
                 $bookItem)
        {
            $booksSortedByBookName[] = $bookItem;
        }



        return sprintf(
            "BooksList name: %s. Books of author names: %s. Books of names: %s;<br>
                    BooksList name: %s. Books of author names: %s. Books of names: %s",
            'booksSortedByAuthorName',
            $this->getAuthorNames($booksSortedByAuthorName),
            $this->getBooksNames($booksSortedByAuthorName),
            'booksSortedByBookName',
            $this->getAuthorNames($booksSortedByBookName),
            $this->getBooksNames($booksSortedByBookName),
        );
    }

    /**
     * @param BookInterface[] $books
     * @return string
     */
    private function getAuthorNames(array $books): string
    {
        $authorsNames = '';
        foreach ($books as $book){
            $authorsNames .= $book->getAuthorName() . ',';
        }
        return $authorsNames;
    }

    /**
     * @param BookInterface[] $books
     * @return string
     */
    private function getBooksNames(array $books): string
    {
        $booksNames = '';
        foreach ($books as $book){
            $booksNames .= $book->getName() . ',';
        }
        return $booksNames;
    }
}
