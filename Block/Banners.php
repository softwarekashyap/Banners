<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Block;
        
class Banners extends \Magento\Framework\View\Element\Template
{
          
    protected $scopeConfig;
    protected $collectionFactory;
    protected $objectManager;
        
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Kashyap\Banners\Model\ResourceModel\Banners\CollectionFactory $collectionFactory,
        \Kashyap\Banners\Helper\Data $dataHelper
    ) {
        
        $this->scopeConfig = $context->getScopeConfig();
        $this->collectionFactory = $collectionFactory;
        $this->storeManagerInterface = $context->getStoreManager();
        $this->dataHelper = $dataHelper;
                
        parent::__construct($context);
    }
        
        
    public function getFrontBanners()
    {

        $collection = $this->collectionFactory->create()->addFieldToFilter('status', 1)->addFieldToFilter('store_views', array('in' => array(0,$this->storeManagerInterface->getStore()->getId())));
        /*
         * cehck for arguments,provided in block call
         */
        if ($ids_list = $this->getBannerBlockArguments()) {
            $collection->addFilter('banners_id', ['in' => $ids_list], 'public');
        }
                
                
        return $collection;
    }
                
        
    public function getBannerBlockArguments()
    {
            
        $list =  $this->getBannerList();
                
        $listArray = [];
                
        if ($list != '') {
            $listArray = explode(',', $list);
        }
                
        return $listArray;
    }
        
    public function getMediaDirectoryUrl()
    {
            
        $media_dir = $this->storeManagerInterface->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
            
        return $media_dir;
    }
}
