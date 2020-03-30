<?php

namespace SmartOSC\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use SmartOSC\Blog\Model\PostFactory;

class Save extends Action
{
    protected $postFactory;
    /**
     * @param Action\Context $context
     */
    public function __construct(Action\Context $context, PostFactory $postFactory)
    {
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }
    /**
     * @inheritDoc
     */
    public function execute()
    {
        try{
            $data = $this->getRequest()->getPostValue();

            $postData = $data;
            unset($postData['category']);
            unset($postData['tag']);

            $post_category = [
                'post_id'=>$data['post_id'],
                'category_id'=>$data['category']
            ];

            $post_tag = [
                'post_id'=>$data['post_id'],
                'tag_id' =>$data['tag']
            ];
            $post = $this->postFactory->create();
            $id = $this->getRequest()->getParam('post_id');
            if (empty($id)) {
                unset($data['post_id']);
            }
            $post->setData($data);
            $post->save();
            $this->messageManager->addSuccess(__('Post has been successfully saved.'));
        } catch (\Exception $e){
            $this->messageManager->addError($e->getMessage());
        }
        return $this->_redirect('*/*/index');
    }
}
