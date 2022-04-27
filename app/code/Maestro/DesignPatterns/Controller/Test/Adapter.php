<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Controller\Test;

use InvalidArgumentException;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Controller\ResultFactory;
use Maestro\DesignPatterns\Api\Adapter\NovaPoshtaAdapterInterface;

/**
 * Controller for test Adapter functionality
 */
class Adapter implements HttpGetActionInterface
{
    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;

    /**
     * @var NovaPoshtaAdapterInterface
     */
    private NovaPoshtaAdapterInterface $novaPoshtaAdapter;

    /**
     * @param ResultFactory $resultFactory
     * @param NovaPoshtaAdapterInterface $novaPoshtaAdapter
     */
    public function __construct(ResultFactory $resultFactory, NovaPoshtaAdapterInterface $novaPoshtaAdapter)
    {
        $this->resultFactory = $resultFactory;
        $this->novaPoshtaAdapter = $novaPoshtaAdapter;
    }

    /**
     * Execute action based on request and return result
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {

        try {
            $responseText = $this->getResponseTextForArray(
                $this->novaPoshtaAdapter->getWarehousesList()
            );
            $responseText .= sprintf(
                "<br> Status #%s",
                $this->novaPoshtaAdapter->getStatusForParcelByNumber('123123')
            );
        } catch (InvalidArgumentException $invalidArgumentException) {
            throw new NotFoundException(__($invalidArgumentException->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)->setContents($responseText);
    }

    /**
     * @param string[] $warehouses
     * @return string
     */
    private function getResponseTextForArray(array $warehouses): string
    {
        $responseText = '';
        foreach ($warehouses as $warehouse) {
            $responseText .= sprintf(
                "Warehouse \"#%s\", ",
                $warehouse,
            );
        }

        return $responseText;
    }
}
