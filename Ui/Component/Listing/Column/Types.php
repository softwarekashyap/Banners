<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Ui\Component\Listing\Column;

/**
 * Class Types
 */
class Types implements \Magento\Framework\Option\ArrayInterface
{
    
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        
        $availableOptions = [ '0' => 'Image', '1' => 'YouTube Video'];
        
        $options = [];
        foreach ($availableOptions as $key => $label) {
            $options[] = [
                'label' => $label,
                'value' => $key,
            ];
        }
        return $options;
    }
}

