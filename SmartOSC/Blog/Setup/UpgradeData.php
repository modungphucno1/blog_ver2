<?php


namespace SmartOSC\Blog\Setup;


use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $_postFactory;

    public function __construct(\SmartOSC\Blog\Model\PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }
    /**
     * @inheritDoc
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.2.3') < 0) {
            // Get tutorial_simplenews table
            $tableName = $setup->getTable('smart_blog_post');
            // Check if the table already exists
            if ($setup->getConnection()->isTableExists($tableName) == true) {
                $data = [
                    [
                        'name'         => "Magento 2 Events",
                        'short_description' => '1111111111111',
                        'post_content' => "This article will talk about Events List in Magento 2. As you know, Magento 2 is using the events driven architecture which will help too much to extend the Magento functionality. We can understand this event as a kind of flag that rises when a specific situation happens. We will use an example module Mageplaza_HelloWorld to exercise this lesson.",
                        'url_key'      => '/magento-2-module-development/magento-2-events.html',
                        'status'       => 1
                    ],
                    [
                        'name'         => "Magento 2 Events 2",
                        'short_description' => '2222222222222',
                        'post_content' => "This article will talk about Events List in Magento 2. As you know, Magento 2 is using the events driven architecture which will help too much to extend the Magento functionality. We can understand this event as a kind of flag that rises when a specific situation happens. We will use an example module Mageplaza_HelloWorld to exercise this lesson.",
                        'url_key'      => '/magento-2-module-development/magento-2-events.html',
                        'status'       => 1
                    ],
                    [
                        'name'         => "Magento 2 Events 33",
                        'short_description' => '2222222222222',
                        'post_content' => "This article will talk about Events List in Magento 2. As you know, Magento 2 is using the events driven architecture which will help too much to extend the Magento functionality. We can understand this event as a kind of flag that rises when a specific situation happens. We will use an example module Mageplaza_HelloWorld to exercise this lesson.",
                        'url_key'      => '/magento-2-module-development/magento-2-events.html',
                        'status'       => 1
                    ],
                    [
                        'name'         => "Magento 2 Events 332",
                        'short_description' => '2222222222222',
                        'post_content' => "This article will talk about Events List in Magento 2. As you know, Magento 2 is using the events driven architecture which will help too much to extend the Magento functionality. We can understand this event as a kind of flag that rises when a specific situation happens. We will use an example module Mageplaza_HelloWorld to exercise this lesson.",
                        'url_key'      => '/magento-2-module-development/magento-2-events.html',
                        'status'       => 1
                    ],  [
                        'name'         => "Magento 2 Events 122",
                        'short_description' => '2222222222222',
                        'post_content' => "This article will talk about Events List in Magento 2. As you know, Magento 2 is using the events driven architecture which will help too much to extend the Magento functionality. We can understand this event as a kind of flag that rises when a specific situation happens. We will use an example module Mageplaza_HelloWorld to exercise this lesson.",
                        'url_key'      => '/magento-2-module-development/magento-2-events.html',
                        'status'       => 1
                    ]
                ];
                foreach ($data as $item) {
                    $setup->getConnection()->insert($tableName, $item);
                }
            }
        }
        $setup->endSetup();
    }
}