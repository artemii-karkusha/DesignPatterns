<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Observer\Model;

interface StormInterface
{
    /**
     *
     * @return bool
     */
    public function isCritical(): bool;

    /**
     *
     * @return bool
     */
    public function isNormal(): bool;

    /**
     *
     * @return bool
     */
    public function isLow(): bool;

    /**
     *
     * @return string
     */
    public function getLocation(): string;
}
