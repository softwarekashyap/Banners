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
    protected $filterProvider;
    protected $timezoneInterface;
    protected $date;        
    protected $customerSesion;        

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        \Magento\Customer\Model\Session $customerSesion,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezoneInterface,
        \Kashyap\Banners\Model\ResourceModel\Banners\CollectionFactory $collectionFactory,
        \Kashyap\Banners\Helper\Data $dataHelper
    ) {        

        $this->scopeConfig = $context->getScopeConfig();
        $this->collectionFactory = $collectionFactory;
        $this->storeManagerInterface = $context->getStoreManager();
        $this->dataHelper = $dataHelper; 
        $this->timezoneInterface = $timezoneInterface;
        $this->_filterProvider = $filterProvider;
        $this->customerSesion = $customerSesion;
        $this->date = $date;           
        parent::__construct($context);
    }

    public function getFrontBanners($bannerId = null)
    {
        $date = $this->timezoneInterface->date()->format('Y-m-d H:i:s');

        $collection = $this->collectionFactory->create()->addFieldToFilter('status', 1)->addFieldToFilter('store_views', array('in' => array(0,$this->storeManagerInterface->getStore()->getId())))->addFieldToFilter('customer_group', array('in' => array($this->customerSesion->getCustomerGroupId())))->addFieldToFilter('start_date', array( array('lteq' => $date), array('start_date', 'null'=>'')))->addFieldToFilter('end_date', array(array('gteq' => $date), array('end_date', 'null'=>'')))->setOrder('sort_order', 'asc');

        /*
         * cehck for arguments,provided in block call
        */

        if ($bannerId) {
            $collection->addFieldToFilter('banners_id', ['in' => $bannerId]);
        }        

        return $collection;
    }

    public function getMediaDirectoryUrl()
    {
        $media_dir = $this->storeManagerInterface->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $media_dir .'banners/';

    }

    /**
     * Prepare HTML content
     *
     * @return string
     */
    public function getCmsFilterContent($value='')
    {
        $html = $this->_filterProvider->getPageFilter()->filter($value);
        return $html;
    }

}

