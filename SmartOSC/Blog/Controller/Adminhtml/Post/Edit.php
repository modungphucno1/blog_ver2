<?php

namespace SmartOSC\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Controller\ResultFactory;

class Edit extends Action
{
    /**
     * @return Page
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
