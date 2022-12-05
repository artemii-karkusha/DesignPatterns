<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Memento\Model;

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
