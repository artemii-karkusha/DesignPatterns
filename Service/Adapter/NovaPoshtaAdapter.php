<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Adapter;

use ArtemiiKarkusha\DesignPatterns\Api\Adapter\NovaPoshtaAdapterInterface;

class NovaPoshtaAdapter implements NovaPoshtaAdapterInterface
{
    /**
     * @var NovaPoshtaApi
     */
    private NovaPoshtaApi $novaPoshtaApi;

    /**
     * @param NovaPoshtaApi $novaPoshtaApi
     */
    public function __construct(NovaPoshtaApi $novaPoshtaApi)
    {
        $this->novaPoshtaApi = $novaPoshtaApi;
    }

    /**
     * @inheritDoc
     */
    public function getWarehousesList(): array
    {
        return $this->novaPoshtaApi->poluchitSpisokOtdelenii();
    }

    /**
     * @inheritDoc
     */
    public function getStatusForParcelByNumber(string $parcelNumber): string
    {
        return $this->novaPoshtaApi->poluchitStatusPoPosiltki($parcelNumber);
    }
}
