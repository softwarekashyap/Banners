<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Effect implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => '', 'label' => __('Please Select Slider Effct')],
            ['value' => 'fade', 'label' => __('fade')],
            ['value' => 'backSlide', 'label' => __('backSlide')],
            ['value' => 'goDown', 'label' => __('goDown')],
            ['value' => 'fadeUp', 'label' => __('fadeUp')],
            ['value' => 'slideOutDown', 'label' => __('slideOutDown')]
        ];
    }
}