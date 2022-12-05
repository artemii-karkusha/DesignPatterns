<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use ArtemiiKarkusha\DesignPatterns\Api\Facade\CalculatorFacadeInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Proxy implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     * @param CalculatorFacadeInterface $calculatorFacade
     */
    public function __construct(
        private ResultFactory $resultFactory,
        private CalculatorFacadeInterface $calculatorFacade
    ) {
    }

    /**
     * @inheritDoc
     * @noinspection PhpCSValidationInspection
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)
            ->setContents($this->getContents());
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        $firstNumber = 10;
        $secondNumber = 5;
        $subtractedNumber = $this->calculatorFacade->subtract($firstNumber, $secondNumber);
        $subtractedNumberFromCache = $this->calculatorFacade->subtract($firstNumber, $secondNumber);
        $dividedNumber = $this->calculatorFacade->divide($firstNumber, $secondNumber);
        $dividedNumberFromCache = $this->calculatorFacade->divide($firstNumber, $secondNumber);
        return sprintf(
            "Devided number: %s. Subtracted number: %s",
            $subtractedNumberFromCache,
            $dividedNumberFromCache
        );
    }
}
