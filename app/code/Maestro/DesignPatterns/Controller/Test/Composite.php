<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Controller\Test;

use Maestro\DesignPatterns\Api\Composite\ElementInterface;
use Maestro\DesignPatterns\Model\Composite\LeafFactory;
use Maestro\DesignPatterns\Model\Composite\NodeFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

/**
 * Controller for test Builder functionality
 */
class Composite implements HttpGetActionInterface
{
    /**
     * @param LeafFactory $leafFactory
     * @param NodeFactory $nodeFactory
     */
    public function __construct(
        private LeafFactory $leafFactory,
        private NodeFactory $nodeFactory,
        private ResultFactory $resultFactory
    ) {}

    /**
     * @inheritDoc
     * @noinspection PhpCSValidationInspection
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_RAW)
            ->setContents(sprintf("Number for tree: %s. It must be 11.", $this->getTree()->getNumber()));
    }

    /**
     * @return ElementInterface
     */
    private function getTree(): ElementInterface
    {
        /** @var ElementInterface $tree */
        $tree = $this->nodeFactory->create();
        $branch1 = $this->nodeFactory->create();
        $branch1->add($this->leafFactory->create());
        $branch1->add($this->leafFactory->create());
        $branch1->add($this->leafFactory->create());
        $branch1->decrement();
        $branch2 = $this->nodeFactory->create();
        $branch2->add($this->leafFactory->create());
        $branch2->add($this->leafFactory->create());
        $branch2->add($this->leafFactory->create());
        $branch2->add($this->leafFactory->create());
        $tree->add($branch1);
        $tree->add($branch2);
        $tree->increment();
        $tree->increment();
        return $tree;
    }
}
