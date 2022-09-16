<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Adapter;

class NovaPoshtaApi
{
    /**
     *
     * @return string[]
     */
    public function poluchitSpisokOtdelenii(): array
    {
        return ['asdasd124556568','asasd43','asdasd12','asdasd67','asdasd89','asdasd01'];
    }

    /**
     *
     * @return string
     */
    public function poluchitStatusPoPosiltki(string $nomerPosiltki): string
    {
        return 'New';
    }
}
