<?php
namespace SmartOSC\Blog\Model\Post;

use Magento\Ui\DataProvider\AbstractDataProvider;
use SmartOSC\Blog\Model\ResourceModel\Post\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $postCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $postCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $postCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $this->_loadedData =  [];
        $items = $this->collection->getItems();
        foreach ($items as $employee) {
            $this->_loadedData[$employee->getId()] = $employee->getData();
        }
        return $this->_loadedData;
    }
}
