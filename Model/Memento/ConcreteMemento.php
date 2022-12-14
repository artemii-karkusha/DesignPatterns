<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\Memento;

use ArtemiiKarkusha\DesignPatterns\Api\Memento\Model\MementoInterface;

class ConcreteMemento implements MementoInterface
{
    /**
     * @var int
     */
    private int $version = 0;

    /**
     * @var string
     */
    private string $serializedData;

    /**
     * @param string $serializedData
     */
    public function __construct(string $serializedData = '')
    {
        $this->serializedData = $serializedData;
    }

    /**
     * @inheritDoc
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @inheritDoc
     */
    public function getSerializedData(): string
    {
        return $this->serializedData;
    }

    /**
     * @inheritDoc
     */
    public function setVersion(int $version): MementoInterface
    {
        $this->version = $version;
        return $this;
    }
}
