<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
   const ENABLED  = 'banner/general/enabled';
   const LOOP  = 'banner/general/loop';
   const NAV  = 'banner/general/nav';
   const PAGINATION  = 'banner/general/pagination';
   const MARGIN  = 'banner/general/margin';
   const AUTOPLAY  = 'banner/general/autoplay';
   const AUTOPLAYHOVERPAUSE  = 'banner/general/autoplayhover';
   const AUTOPALAYSPEED  = 'banner/general/autoplayspeed';
   const AUTOPAYTIMEOUT  = 'banner/general/autoplaytimeout';
   const EFFECT  = 'banner/general/effect';

    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }

    public function getEnable()
    {
        return $this->scopeConfig->getValue(self::ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    
    public function getLoop()
    {
        return $this->scopeConfig->getValue(self::LOOP, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    
    public function getNav()
    {
        return $this->scopeConfig->getValue(self::NAV, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    
    public function getPagination()
    {
        return $this->scopeConfig->getValue(self::PAGINATION, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    
    public function getMargin()
    {
        return $this->scopeConfig->getValue(self::MARGIN, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    
    public function getAutoplay()
    {
        return $this->scopeConfig->getValue(self::AUTOPLAY, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    
    public function getAutoplayHoverPause()
    {
        return $this->scopeConfig->getValue(self::AUTOPLAYHOVERPAUSE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    
    public function getAutoPlaySpeed()
    {
        return $this->scopeConfig->getValue(self::AUTOPALAYSPEED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    
    public function getAutoPlayTimeout()
    {
        return $this->scopeConfig->getValue(self::AUTOPAYTIMEOUT, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    
    public function getEffect()
    {
        return $this->scopeConfig->getValue(self::EFFECT, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
