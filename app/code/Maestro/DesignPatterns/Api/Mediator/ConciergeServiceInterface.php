<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Mediator;

use Magento\Framework\Exception\NotFoundException;

interface ConciergeServiceInterface
{
    /**
     * @param string $requestName
     * @return void
     *
     * @throws NotFoundException
     */
    public function executeRequestByName(string $requestName): void;
}
