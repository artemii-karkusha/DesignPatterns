<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Service\Proxy;

use Maestro\DesignPatterns\Api\Facade\CalculatorFacadeInterface;
use Magento\Framework\App\CacheInterface;

class CalculatorFacadeWithCaching implements CalculatorFacadeInterface
{

    private const OPERATION_DIVIDE = 'divide';

    private const OPERATION_SUBTRACT = 'subtract';

    /**
     * @var CalculatorFacadeInterface
     */
    private CalculatorFacadeInterface $calculatorFacade;

    /**
     * @var CacheInterface
     */
    private CacheInterface $cacheManager;

    /**
     * @param CalculatorFacadeInterface $calculatorFacade
     * @param CacheInterface $cacheManager
     */
    public function __construct(
        CalculatorFacadeInterface $calculatorFacade,
        CacheInterface $cacheManager
    ) {
        $this->calculatorFacade = $calculatorFacade;
        $this->cacheManager = $cacheManager;
    }

    /**
     * @inheritDoc
     */
    public function divide(int $firstNumber, int $secondNumber): int
    {
        $identifier = $this->generateIdentifier($firstNumber, $secondNumber, self::OPERATION_DIVIDE);
        if ($this->isCacheExist($identifier)) {
            return $this->getConvertedValueFromCache($identifier);
        }

        $dividedValue = $this->calculatorFacade->divide($firstNumber, $secondNumber);
        $this->saveResultFromFunctionToCache(
            (string)$dividedValue,
            $identifier
        );

        return $dividedValue;
    }

    /**
     * @inheritDoc
     */
    public function subtract(int $firstNumber, int $secondNumber): int
    {
        $identifier = $this->generateIdentifier($firstNumber, $secondNumber, self::OPERATION_SUBTRACT);
        if ($this->isCacheExist($identifier)) {
            return $this->getConvertedValueFromCache($identifier);
        }

        $subtrackedValue = $this->calculatorFacade->subtract($firstNumber, $secondNumber);
        $this->saveResultFromFunctionToCache(
            (string)$subtrackedValue,
            $identifier
        );

        return $subtrackedValue;
    }

    /**
     * @param string $identifier
     * @return bool
     */
    private function isCacheExist(string $identifier): bool
    {
        return !empty($this->cacheManager->load($identifier));
    }

    /**
     * @param string $identifier
     * @return int
     */
    private function getConvertedValueFromCache(string $identifier): int
    {
        return (int)$this->cacheManager->load($identifier);
    }

    /**
     * @param int $firstNumber
     * @param int $secondNumber
     * @param string $operation
     * @return string
     */
    private function generateIdentifier(int $firstNumber, int $secondNumber, string $operation): string
    {
        return base64_encode($firstNumber . $operation . $secondNumber);
    }

    /**
     * @param string $valueToSave
     * @param string $identifier
     * @return void
     */
    private function saveResultFromFunctionToCache(string $valueToSave, string $identifier): void
    {
        $this->cacheManager->save(
            $valueToSave,
            $identifier
        );
    }
}
