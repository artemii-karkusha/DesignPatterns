<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Memento\Model;

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
