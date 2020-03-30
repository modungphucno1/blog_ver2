<?php

namespace SmartOSC\Blog\UI\Component\Option;

use SmartOSC\Blog\Model\ResourceModel\Category\CollectionFactory;

class CategoryOption implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var array|null
     */
    protected $_options;

    /**
     * Option constructor.
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory
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
                    'label' => __($category['category_name']),
                    'value' => $category->getId()
                ];
            }
        }

        return $this->_options;
    }
}
