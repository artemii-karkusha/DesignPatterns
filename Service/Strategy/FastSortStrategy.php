<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 *
 * @noinspection NestedAssignmentsUsageInspection
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Strategy;

use ArtemiiKarkusha\DesignPatterns\Api\Strategy\SortListStrategyInterface;

class FastSortStrategy implements SortListStrategyInterface
{
    /**
     * @inheritDoc
     */
    public function sort(iterable $list): iterable
    {
        $countItems = count($list);
        if ($countItems <= 1) {
            return $list;
        }

        // Conceptual example from Internet. Copy
        $intermediateValue = $list[0];

        $leftSideFromIntermediateValue = $rightSideFromIntermediateValue = [];

        for ($i = 1; $i < $countItems; $i++) {
            if ($intermediateValue > $list[$i]) {
                $leftSideFromIntermediateValue[] = $list[$i];
            } else {
                $rightSideFromIntermediateValue[] = $list[$i];
            }
        }

        $leftSideFromIntermediateValue = $this->sort($leftSideFromIntermediateValue);
        $rightSideFromIntermediateValue = $this->sort($rightSideFromIntermediateValue);

        return array_merge(
            (array)$leftSideFromIntermediateValue,
            [$intermediateValue],
            (array)$rightSideFromIntermediateValue
        );
    }
}
