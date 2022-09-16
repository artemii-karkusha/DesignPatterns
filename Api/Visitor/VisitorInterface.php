<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Visitor;

use Maestro\DesignPatterns\Model\Builder\Bacon;
use Maestro\DesignPatterns\Model\Builder\Cheese;
use Maestro\DesignPatterns\Model\Builder\Pineapples;

interface VisitorInterface
{
    /**
     * @param Bacon $bacon
     * @return void
     */
    public function visitBacon(Bacon $bacon): void;

    /**
     * @param Cheese $cheese
     * @return void
     */
    public function visitCheese(Cheese $cheese): void;

    /**
     * @param Pineapples $pineapples
     * @return void
     */
    public function visitPineapple(Pineapples $pineapples): void;
}
