<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Strategy;

use Maestro\DesignPatterns\Api\Strategy\SortListStrategyInterface;

class BubbleSortStrategy implements SortListStrategyInterface
{
    /**
     * @inheritDoc
     */
    public function sort(iterable $list): iterable
    {
        // Conceptual example from Internet. Copy
        $success = true;
        while ($success) {
            $success = false;
            for ($i = 0, $iMax = count($list); $i < $iMax; $i++) {
                if (count($list) === $i + 1 || $list[$i] <= $list[$i + 1]) {
                    continue;
                }
                $timeNumber = $list[$i];
                $list[$i] = $list[$i + 1];
                $list[$i + 1] = $timeNumber;
                $success = true;
            }
        }
        return $list;
    }
}
