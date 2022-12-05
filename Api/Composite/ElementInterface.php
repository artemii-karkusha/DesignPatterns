<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Composite;

interface ElementInterface
{
    /**
     *
     * @param ElementInterface $element
     * @return void
     */
    public function add(ElementInterface $element): void;

    /**
     *
     * @return int
     */
    public function getNumber(): int;

    /**
     *
     * @return void
     */
    public function increment(): void;

    /**
     *
     * @return void
     */
    public function decrement(): void;
}
