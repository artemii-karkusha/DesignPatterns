<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Strategy;

interface SortListStrategyInterface
{
    /**
     *
     * @param iterable $list
     * @return iterable
     */
    public function sort(iterable $list): iterable;
}
