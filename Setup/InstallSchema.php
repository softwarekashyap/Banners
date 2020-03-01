<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/


namespace Kashyap\Banners\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
        
        
        
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
               
        $installer = $setup;
        $installer->startSetup();
                
                
        /**
            * Create table 'banners'
        */
                
        $table = $installer->getConnection()->newTable($installer->getTable('ks_banners'))
        ->addColumn(
            'banners_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Banners ID'
        )
        ->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true, 'default' => null],
            'Title'
        )
        ->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            ['nullable' => true, 'default' => null],
            'Description'
        )
        ->addColumn(
            'store_views',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            23,
            ['nullable' => true, 'default' => null],
            'Store Views'
        )
        ->addColumn(
            'bannerimage',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Banner Image'
        )
        ->addColumn(
            'link',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Link'
        )
        ->addColumn(
            'target',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Target'
        )
        ->addColumn(
            'sort_order',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false, 'unsigned' => true, 'default' => '0'],
            'Sort Order'
        )
        ->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'unsigned' => true, 'default' => '1'],
            'Date'
        )
        ->addColumn(
            'created_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
            'Creation Time'
        )
        ->addColumn(
            'update_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
            'Update Time'
        );
                
                
        $installer->getConnection()->createTable($table);
                
        $installer->endSetup();
    }
}
