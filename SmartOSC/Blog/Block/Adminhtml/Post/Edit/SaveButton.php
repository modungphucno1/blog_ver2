<?php


namespace SmartOSC\Blog\Block\Adminhtml\Post\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * @inheritDoc
     */
    public function getButtonData()
    {
        return [
            'label' => 'Save',
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'button' => ['event' => 'save'],
                ],
            ],
            'sort_order' => 80,
        ];
    }
}
