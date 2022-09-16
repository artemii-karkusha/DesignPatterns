<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\State\Model;

use Exception;
use Maestro\DesignPatterns\Api\State\Model\OvenState\OvenStateInterface;

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
