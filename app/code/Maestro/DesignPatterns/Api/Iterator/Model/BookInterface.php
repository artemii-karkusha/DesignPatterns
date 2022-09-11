<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Iterator\Model;

interface BookInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getAuthorName(): string;

    /**
     * @return string
     */
    public function getYearOfPublishing(): string;
}
