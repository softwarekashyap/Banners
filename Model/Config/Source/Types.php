<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Types implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => '0', 'label' => __('Image')],
            ['value' => '1', 'label' => __('YouTube Video')]
        ];
    }
}