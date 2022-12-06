<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Iterator;

use InvalidArgumentException;
use Iterator;
use ArtemiiKarkusha\DesignPatterns\Api\Iterator\Model\IterableCollection;

class IteratorFactoryMethod
{

    private const DEFAULT_BOOKS_ITERATOR_NAME = 'books_iterator';

    /**
     * @param Iterator[] $factoriesIterators
     */
    public function __construct(
        private array $factoriesIterators = []
    ) {
    }

    /**
     * @param IterableCollection $iterableCollection
     * @param string $iteratorName
     * @return Iterator
     *
     * @noinspection PhpPossiblePolymorphicInvocationInspection
     * @noinspection PhpStaticAsDynamicMethodCallInspection
     */
    public function createIterator(IterableCollection $iterableCollection, string $iteratorName): Iterator
    {
        try {
            $iteratorFactory = $this->getFactoryByIteratorName($iteratorName);
        } catch (InvalidArgumentException) {
            $iteratorFactory = $this->getFactoryByIteratorName(self::DEFAULT_BOOKS_ITERATOR_NAME);
        }

        return $iteratorFactory->create(['collectionOfBooks' => $iterableCollection]);
    }

    /**
     * @param string $iteratorName
     * @return mixed
     * @throws InvalidArgumentException
     */
    private function getFactoryByIteratorName(string $iteratorName)
    {
        if (!isset($this->factoriesIterators[$iteratorName])) {
            throw new InvalidArgumentException((string)__('Class for %1 don\'t exist', $iteratorName));
        }

        return $this->factoriesIterators[$iteratorName];
    }
}
