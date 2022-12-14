<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Singleton;

use Exception;

/**
 * Singleton
 */
class Persons
{
    /**
     * @var array
     */
    public static array $persons = [];

    /**
     * @var string
     */
    private string $hash;

    /**
     * @param string $hash
     */
    private function __construct(string $hash)
    {
        $this->hash = $hash;
    }

    /**
     *
     * @return Persons
     */
    public static function getInstance(): Persons
    {
        if (count(static::$persons) < 10) {
            static::$persons[] = new Persons(bin2hex(self::getRandomBytes()));
        }

        return array_last(static::$persons);
    }

    /**
     *
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    private static function getRandomBytes(): string
    {
        try {
            return random_bytes(22);
        } catch (Exception) {}
    }
}
