<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/


namespace Kashyap\Banners\Model;

class Banners extends \Magento\Framework\Model\AbstractModel
{
        
        
    protected function _construct()
    {
        $this->_init('Kashyap\Banners\Model\ResourceModel\Banners');
    }
        
        
    public function getAvailableStatuses()
    {
                
                
        $availableOptions = ['1' => 'Enable',
                          '0' => 'Disable'];
                
        return $availableOptions;
    }
}
