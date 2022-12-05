<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Mediator;

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
