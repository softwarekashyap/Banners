<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Model\ResourceModel\Banners;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'banners_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Kashyap\Banners\Model\Banners::class,
            \Kashyap\Banners\Model\ResourceModel\Banners::class
        );
    }
}

