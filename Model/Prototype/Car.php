<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) Artemii Karkusha
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\Prototype;

use Maestro\DesignPatterns\Api\Prototype\CarInterface;

class Car implements CarInterface
{
    /**
     * @var string
     */
    private string $color = '';

    /**
     * @var string
     */
    private string $number = '';

    /**
     * @var string
     */
    private string $carType = '';

    /**
     * @inheritDoc
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @inheritDoc
     */
    public function setColor(string $color): CarInterface
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @inheritDoc
     */
    public function setNumber(string $number): CarInterface
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getTypeCar(): string
    {
        return $this->carType;
    }

    /**
     * @inheritDoc
     */
    public function setTypeCar(string $typeCar): CarInterface
    {
        $this->carType = $typeCar;
        return $this;
    }
}
