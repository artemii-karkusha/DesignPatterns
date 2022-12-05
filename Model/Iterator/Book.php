<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Model\Iterator;

use ArtemiiKarkusha\DesignPatterns\Api\Iterator\Model\BookInterface;

class Book implements BookInterface
{
    /**
     * @param string $name
     * @param string $authorName
     * @param string $yearOfPublishing
     */
    public function __construct(
        private string $name,
        private string $authorName,
        private string $yearOfPublishing
    ) {}

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    /**
     * @inheritDoc
     */
    public function getYearOfPublishing(): string
    {
        return $this->yearOfPublishing;
    }
}
