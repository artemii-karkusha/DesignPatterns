<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Command\Service;

interface AddIngredientCommandInterface
{
    /**
     * @return void
     */
    public function execute(): void;
}
