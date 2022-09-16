<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Adapter;

use Maestro\DesignPatterns\Api\Adapter\NovaPoshtaAdapterInterface;

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
