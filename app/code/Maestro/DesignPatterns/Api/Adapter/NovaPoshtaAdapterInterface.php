<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Adapter;

interface NovaPoshtaAdapterInterface
{
    /**
     *
     * @return array
     */
    public function getWarehousesList(): array;

    /**
     *
     * @param string $parcelNumber
     * @return string
     */
    public function getStatusForParcelByNumber(string $parcelNumber): string;
}
