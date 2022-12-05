<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Adapter;

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
