<?php


namespace SmartOSC\Blog\Block\Adminhtml\Post\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * @inheritDoc
     */
    public function getButtonData()
    {
        $data =[];
        if($this->getPostID()){
            $data = [
                'label' => __('Delete'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                        'Are you sure you want to do this?'
                    ) . '\', \'' . $this->getDeleteUrl() . '\', {"data": {}})',
                'sort_order' => 20,
                ];
        }
        return $data;
    }

    /**
     * URL to send delete requests to.
     *
     * @param array $args
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['post_id' => $this->getPostID()]);
    }
}