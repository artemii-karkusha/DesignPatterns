<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Memento\Model;

interface TextAreaInterface
{
    /**
     * @return string
     */
    public function getText(): string;

    /**
     * @param string $text
     * @return TextAreaInterface
     */
    public function setText(string $text): TextAreaInterface;
}
