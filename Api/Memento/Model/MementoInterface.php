<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Memento\Model;

interface MementoInterface
{
    /**
     * @param int $version
     * @return MementoInterface
     */
    public function setVersion(int $version): MementoInterface;

    /**
     * @return int
     */
    public function getVersion(): int;

    /**
     * @return string
     */
    public function getSerializedData(): string;
}
