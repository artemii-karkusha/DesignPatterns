<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Api\Command\Service;

interface AddIngredientCommandInterface
{
    /**
     * @return void
     */
    public function execute(): void;
}
