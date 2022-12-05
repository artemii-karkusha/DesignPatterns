<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\State\Model\OvenState;

use Exception;
use ArtemiiKarkusha\DesignPatterns\Api\State\Model\OvenInterface;

interface OvenStateInterface
{
    /**
     * @return void
     *
     * @throws Exception
     */
    public function bake(): void;

    /**
     * @return void
     */
    public function warm(): void;

    /**
     * @param OvenInterface $oven
     * @return OvenStateInterface
     */
    public function setOven(OvenInterface $oven): OvenStateInterface;
}
