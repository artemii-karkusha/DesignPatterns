<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Strategy;

use ArtemiiKarkusha\DesignPatterns\Api\Strategy\SorterListInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Strategy\SortListStrategyInterface;

class SorterList implements SorterListInterface
{
    /**
     * @param SortListStrategyInterface $sortListStrategy
     */
    public function __construct(private SortListStrategyInterface $sortListStrategy)
    {
        $this->setSortStrategy($sortListStrategy);
    }

    /**
     * @inheritDoc
     */
    public function sort(iterable $list): iterable
    {
        return $this->sortListStrategy->sort($list);
    }

    /**
     * @inheritDoc
     */
    public function setSortStrategy(SortListStrategyInterface $sortStrategy): SorterListInterface
    {
        $this->sortListStrategy = $sortStrategy;
        return $this;
    }
}
