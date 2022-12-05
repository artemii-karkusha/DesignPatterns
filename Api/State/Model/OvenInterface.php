<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\State\Model;

use Exception;
use ArtemiiKarkusha\DesignPatterns\Api\State\Model\OvenState\OvenStateInterface;

interface OvenInterface
{
    /**
     * @return void
     *
     * @throws Exception
     */
    public function bake(): void;

    /**
     * @param OvenStateInterface $ovenState
     * @return void
     */
    public function transitionToOvenState(OvenStateInterface $ovenState): void;
}
