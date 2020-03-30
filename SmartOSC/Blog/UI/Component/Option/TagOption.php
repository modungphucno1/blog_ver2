<?php


namespace SmartOSC\Blog\UI\Component\Option;


class TagOption implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * @var \SmartOSC\Blog\Model\ResourceModel\Tag\CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var array|null
     */
    protected $_options;

    /**
     * Option constructor.
     * @param \SmartOSC\Blog\Model\ResourceModel\Tag\CollectionFactory $collectionFactory
     */
    public function __construct(
        \SmartOSC\Blog\Model\ResourceModel\Tag\CollectionFactory $collectionFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        if ($this->_options === null) {
            $collection = $this->_collectionFactory->create();

            $this->_options = [['label' => '', 'value' => '']];

            foreach ($collection as $category) {
                $this->_options[] = [
                    'label' => __($category['tag']),
                    'value' => $category->getId()
                ];
            }
        }

        return $this->_options;
    }
}
