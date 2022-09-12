<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Model\Memento;

use Maestro\DesignPatterns\Api\Memento\Model\ItCanSaveAndRestoreState;
use Maestro\DesignPatterns\Api\Memento\Model\MementoInterface;
use Maestro\DesignPatterns\Api\Memento\Model\TextAreaInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Serialize\Serializer\Json as JsonSerializer;
use Maestro\DesignPatterns\Api\Memento\Model\MementoInterfaceFactory;

class TextArea extends DataObject implements TextAreaInterface, ItCanSaveAndRestoreState
{
    /**
     * @var string
     */
    private string $text = '';

    /**
     * @var JsonSerializer
     */
    private JsonSerializer $jsonSerializer;

    /**
     * @var MementoInterfaceFactory
     */
    private MementoInterfaceFactory $mementoFactory;

    /**
     * @param JsonSerializer $jsonSerializer
     * @param MementoInterfaceFactory $mementoFactory
     * @param array $data
     */
    public function __construct(
        JsonSerializer $jsonSerializer,
        MementoInterfaceFactory $mementoFactory,
        array $data = []
    ) {
        parent::__construct($data);
        $this->jsonSerializer = $jsonSerializer;
        $this->mementoFactory = $mementoFactory;
    }

    /**
     * @inheritDoc
     */
    public function getText(): string
    {
        return $this->getData('text');
    }

    /**
     * @inheritDoc
     */
    public function setText(string $text): TextAreaInterface
    {
        return $this->setData('text', $text);
    }

    /**
     * @inheritDoc
     */
    public function restore(MementoInterface $memento): void
    {
        $this->setData(
            $this->jsonSerializer->unserialize(
                $memento->getSerializedData()
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function saveState(): MementoInterface
    {
        return $this->mementoFactory->create(
            ['serializedData' => $this->jsonSerializer->serialize($this->toArray())]
        );
    }

    /**
     * @inheritDoc
     */
    public function getGroupLabel(): string
    {
        return md5(__CLASS__);
    }
}
