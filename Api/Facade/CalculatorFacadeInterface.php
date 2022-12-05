<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Api\Facade;

interface CalculatorFacadeInterface
{

    /**
     * @param int $firstNumber
     * @param int $secondNumber
     * @return int
     */
    public function divide(int $firstNumber, int $secondNumber): int;

    /**
     * @param int $firstNumber
     * @param int $secondNumber
     * @return int
     */
    public function subtract(int $firstNumber, int $secondNumber): int;
}
