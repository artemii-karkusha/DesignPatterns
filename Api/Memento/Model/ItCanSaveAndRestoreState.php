<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Memento\Model;

interface ItCanSaveAndRestoreState
{
    /**
     * @param MementoInterface $memento
     * @return void
     */
    public function restore(MementoInterface $memento): void;

    /**
     * @return MementoInterface
     */
    public function saveState(): MementoInterface;

    /**
     * @return string
     */
    public function getGroupLabel(): string;
}
