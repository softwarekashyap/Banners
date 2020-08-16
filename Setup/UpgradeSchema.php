<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Custom Table update
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $setup->startSetup();

        $version = $context->getVersion();
        $connection = $setup->getConnection();
        $tablename = "ks_banners";
        if (version_compare($version, '1.0.1') < 0) 
        {
            //Custom table
           $connection->addColumn(
                $setup->getTable($tablename),
                'types',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'comment' =>'Slider Type',
                    'nullable' => false,
                ]
            );

            $connection->addColumn(
                $setup->getTable($tablename),
                'video_link',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'comment' =>'Video link',
                    'nullable' => false,
                ]
            );            
        }

        $setup->endSetup();
    }
}