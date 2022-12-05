<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Strategy;

interface SortListStrategyInterface
{
    /**
     *
     * @param iterable $list
     * @return iterable
     */
    public function sort(iterable $list): iterable;
}
