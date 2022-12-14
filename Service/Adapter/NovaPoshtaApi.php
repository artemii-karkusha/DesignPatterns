<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Adapter;

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
     * @param string $nomerPosiltki
     * @return string
     */
    public function poluchitStatusPoPosiltki(string $nomerPosiltki): string
    {
        return 'New';
    }
}
