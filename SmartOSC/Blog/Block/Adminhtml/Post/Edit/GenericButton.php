<?php


namespace SmartOSC\Blog\Block\Adminhtml\Post\Edit;


use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use SmartOSC\Blog\Model\PostFactory;

class GenericButton
{
    /**
     * @var Context
     */
    protected $context;


    /**
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        $this->context = $context;
    }


    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }

    /**
     * @return mixed
     */
    public function getPostID(){
        return $this->context->getRequest()->getParam('post_id');
    }
}
