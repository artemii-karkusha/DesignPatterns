<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Memento;

use Maestro\DesignPatterns\Api\Memento\Model\ItCanSaveAndRestoreState;
use Magento\Framework\Exception\NotFoundException;

interface CaretakerInterface
{
    /**
     * @param ItCanSaveAndRestoreState $item
     * @return void
     */
    public function backup(ItCanSaveAndRestoreState $item): void;

    /**
     * @param ItCanSaveAndRestoreState $item
     * @return void
     */
    public function undo(ItCanSaveAndRestoreState $item): void;

    /**
     * @param ItCanSaveAndRestoreState $item
     * @return void
     *
     * @throws NotFoundException
     */
    public function restoreToVersion(ItCanSaveAndRestoreState $item, int $version): void;

    /**
     * @param ItCanSaveAndRestoreState $item
     * @return void
     */
    public function showHistory(ItCanSaveAndRestoreState $item): void;
}
