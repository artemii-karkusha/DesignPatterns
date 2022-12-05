<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Visitor;

use ArtemiiKarkusha\DesignPatterns\Model\Builder\Bacon;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Cheese;
use ArtemiiKarkusha\DesignPatterns\Model\Builder\Pineapples;

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
