<?php


namespace SmartOSC\Blog\Controller\Adminhtml\Post;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use SmartOSC\Blog\Model\PostFactory;

class Delete extends Action
{
    protected $postFactory;

    /**
     * @param Action\Context $context
     * @param PostFactory $postFactory
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
            $post = $this->postFactory->create();
            $id = $this->getRequest()->getParam('post_id');
            if ($id) {
                $postDB = $post->load($id);
                if(count($postDB->getData()) > 0){
                    $post->delete();
                    $this->messageManager->addSuccess(__('Post has been successfully deleted.'));
                }else{
                    $this->messageManager->addError('Post has not existed');
                }

            }else{
                $this->messageManager->addError('Post has not existed');
            }
        } catch (\Exception $e){
            $this->messageManager->addError($e->getMessage());
        }
        return $this->_redirect('smartblog/post/index');
    }
}