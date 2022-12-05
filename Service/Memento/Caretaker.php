<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Memento;

use ArtemiiKarkusha\DesignPatterns\Api\Memento\CaretakerInterface;
use ArtemiiKarkusha\DesignPatterns\Api\Memento\Model\ItCanSaveAndRestoreState;
use ArtemiiKarkusha\DesignPatterns\Api\Memento\Model\MementoInterface;
use ArtemiiKarkusha\Framework\Exception\NotFoundException;

class Caretaker implements CaretakerInterface
{
    /**
     * @var MementoInterface[][]
     */
    private array $mementos = [];

    /**
     * @inheritDoc
     */
    public function backup(ItCanSaveAndRestoreState $item): void
    {
        $this->mementos[$item->getGroupLabel()][] = $item->saveState()
            ->setVersion($this->getNextVersionMemento($item->getGroupLabel()));
    }

    /**
     * @inheritDoc
     */
    public function undo(ItCanSaveAndRestoreState $item): void
    {
        if (!isset($this->mementos[$item->getGroupLabel()])) {
            return;
        }

        $item->restore(memento: array_pop($this->mementos[$item->getGroupLabel()]));
    }

    /**
     * @inheritDoc
     */
    public function restoreToVersion(ItCanSaveAndRestoreState $item, int $version): void
    {
        if (!isset($this->mementos[$item->getGroupLabel()])) {
            return;
        }

        foreach ($this->mementos[$item->getGroupLabel()] as $memento) {
            if ($memento->getVersion() !== $version){
                continue;
            }

            $item->restore($memento);
            return;
        }

        throw new NotFoundException(__('%1 version is not exist', $version));
    }

    /**
     * @inheritDoc
     */
    public function showHistory(ItCanSaveAndRestoreState $item): void
    {
        if (!isset($this->mementos[$item->getGroupLabel()])) {
            return;
        }

        foreach ($this->mementos[$item->getGroupLabel()] as $memento) {
            echo sprintf(
                'Group Label: %s Version: %s , Serialized Data: %s <br>',
                $item->getGroupLabel(),
                $memento->getVersion(),
                $memento->getSerializedData()
            );
        }
    }

    /**
     * @param string $groupLabel
     * @return int
     */
    private function getNextVersionMemento(string $groupLabel): int
    {
        if (!isset($this->mementos[$groupLabel])){
            return 0;
        }

        return $this->getLastMemento($groupLabel)->getVersion() + 1;
    }

    /**
     * @param string $groupLabel
     * @return MementoInterface
     */
    private function getLastMemento(string $groupLabel): MementoInterface
    {
        return $this->mementos[$groupLabel][
            array_key_last($this->mementos[$groupLabel])
        ];
    }
}
