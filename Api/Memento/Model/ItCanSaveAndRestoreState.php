<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Memento\Model;

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
