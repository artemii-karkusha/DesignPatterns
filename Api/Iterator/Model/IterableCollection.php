<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Iterator\Model;

use Iterator;

interface IterableCollection
{
    /**
     * @param string $iteratorName
     * @return Iterator
     */
    public function createIterator(string $iteratorName): Iterator;
}
