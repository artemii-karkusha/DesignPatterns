<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c)
 */

declare(strict_types=1);

namespace Maestro\DesignPatterns\Controller\Test;

use Maestro\DesignPatterns\Api\Memento\Model\TextAreaInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Maestro\DesignPatterns\Api\Memento\Model\TextAreaInterfaceFactory;
use Maestro\DesignPatterns\Api\Memento\CaretakerInterface;
use Magento\Framework\Exception\NotFoundException;

class Memento implements HttpGetActionInterface
{
    /**
     * @param ResultFactory $resultFactory
     * @param TextAreaInterfaceFactory $textAreaFactory
     * @param CaretakerInterface $caretaker
     */
    public function __construct(
        private ResultFactory $resultFactory,
        private TextAreaInterfaceFactory $textAreaFactory,
        private CaretakerInterface $caretaker
    ) {
    }

    /**
     * @inheritDoc
     * @noinspection PhpCSValidationInspection
     */
    public function execute()
    {
        $this->getContents();
        return $this->resultFactory->create(ResultFactory::TYPE_RAW);
    }

    /**
     * @return void
     */
    public function getContents(): void
    {
        /** @var TextAreaInterface $textArea */
        $textArea = $this->textAreaFactory->create()->setText('Text Version 0');
        $this->caretaker->backup($textArea);
        $textArea->setText('Text Version 1');
        $this->caretaker->backup($textArea);
        $textArea->setText('Text Version 2');
        $this->caretaker->backup($textArea);
        $textArea->setText('Text Version 3');
        $this->caretaker->backup($textArea);
        $textArea->setText('Text Version 4');
        $this->caretaker->backup($textArea);
        $this->caretaker->showHistory($textArea);
        $textArea->setText('Text Version 5');
        echo 'before Undo <br>';
        echo $textArea->getText('Text Version 5') . '<br>';
        $this->caretaker->undo($textArea);
        echo 'after Undo <br>';
        echo $textArea->getText() . '<br>';
        $this->caretaker->showHistory($textArea);
        echo 'before restoreToVersion 1<br>';
        echo $textArea->getText() . '<br>';
        $this->caretaker->restoreToVersion($textArea, 1);
        echo 'after restoreToVersion 1<br>';
        echo $textArea->getText() . '<br>';

        try {
            $this->caretaker->restoreToVersion($textArea, 25);
        } catch (NotFoundException $notFoundException) {
            echo $notFoundException->getMessage() . '<br>';
        }
    }
}
