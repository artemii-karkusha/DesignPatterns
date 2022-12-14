<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use ArtemiiKarkusha\DesignPatterns\Api\Facade\CalculatorFacadeInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

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
     */
    public function execute(): ResultInterface
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
            'Devided number: %s; Devided number from cache: %s.
            Subtracted number: %s; Subtracted number: %s from cache',
            $dividedNumber,
            $dividedNumberFromCache,
            $subtractedNumber,
            $subtractedNumberFromCache,
        );
    }
}
