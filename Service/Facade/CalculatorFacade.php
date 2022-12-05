<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Service\Facade;

use ArtemiiKarkusha\DesignPatterns\Api\Facade\CalculatorFacadeInterface;

class CalculatorFacade implements CalculatorFacadeInterface
{
    private const OPERATION_DEVIDE = 'devide';
    private const OPERATION_SUBTRACT = 'subtract';

    /**
     * @inheritDoc
     */
    public function divide(int $firstNumber, int $secondNumber): int
    {
        return $this->callToExternalService(self::OPERATION_DEVIDE, $firstNumber, $secondNumber);
    }

    /**
     * @inheritDoc
     */
    public function subtract(int $firstNumber, int $secondNumber): int
    {
        return $this->callToExternalService(self::OPERATION_SUBTRACT, $firstNumber, $secondNumber);
    }

    /**
     * It must be a big service with a lot of functions.
     *
     * @param string $operation
     * @param int $firstNumber
     * @param int $secondNumber
     * @return int
     */
    private function callToExternalService(string $operation, int $firstNumber, int $secondNumber): int
    {
        return $operation === self::OPERATION_DEVIDE ? $firstNumber / $secondNumber :  $firstNumber - $secondNumber;
    }
}
