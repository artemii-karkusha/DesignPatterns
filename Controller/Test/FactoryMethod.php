<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\DesignPatterns\Controller\Test;

use InvalidArgumentException;
use ArtemiiKarkusha\DesignPatterns\Model\FactoryMethod\Meat;
use ArtemiiKarkusha\DesignPatterns\Model\FactoryMethod\Potato;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Controller\ResultFactory;
use ArtemiiKarkusha\DesignPatterns\Service\FactoryMethod\Bake;

/**
 * Controller for test FactoryMethod functionality
 */
class FactoryMethod implements HttpGetActionInterface
{
    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;

    /**
     * @var Bake
     */
    private Bake $bake;

    /**
     * @param ResultFactory $resultFactory
     * @param Bake $bake
     */
    public function __construct(ResultFactory $resultFactory, Bake $bake)
    {
        $this->resultFactory = $resultFactory;
        $this->bake = $bake;
    }

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        try {
            $meat = $this->bake->cook(Meat::MEAT_NAME);
            $potato = $this->bake->cook(Potato::MEAT_NAME);
            $responseText = sprintf('Meat getName is %s', $meat->getName());
            $responseText .= sprintf(', Potato getName is %s', $potato->getName());
        } catch (InvalidArgumentException $invalidArgumentException) {
            throw new NotFoundException(__($invalidArgumentException->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)->setContents($responseText);
    }
}
