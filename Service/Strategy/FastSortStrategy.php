<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Strategy;

use Maestro\DesignPatterns\Api\Strategy\SortListStrategyInterface;

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

        // Определяем промежуточное значение, которое является ссылочным значением
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
