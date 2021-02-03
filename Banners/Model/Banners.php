<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Model;

use Kashyap\Banners\Api\Data\BannersInterface;
use Kashyap\Banners\Api\Data\BannersInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Banners extends \Magento\Framework\Model\AbstractModel
{

    protected $bannersDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'ks_banners';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param BannersInterfaceFactory $bannersDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Kashyap\Banners\Model\ResourceModel\Banners $resource
     * @param \Kashyap\Banners\Model\ResourceModel\Banners\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        BannersInterfaceFactory $bannersDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Kashyap\Banners\Model\ResourceModel\Banners $resource,
        \Kashyap\Banners\Model\ResourceModel\Banners\Collection $resourceCollection,
        array $data = []
    ) {
        $this->bannersDataFactory = $bannersDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve banners model with banners data
     * @return BannersInterface
     */
    public function getDataModel()
    {
        $bannersData = $this->getData();
        
        $bannersDataObject = $this->bannersDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $bannersDataObject,
            $bannersData,
            BannersInterface::class
        );
        
        return $bannersDataObject;
    }
}

