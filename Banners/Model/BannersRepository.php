<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Model;

use Kashyap\Banners\Api\BannersRepositoryInterface;
use Kashyap\Banners\Api\Data\BannersInterfaceFactory;
use Kashyap\Banners\Api\Data\BannersSearchResultsInterfaceFactory;
use Kashyap\Banners\Model\ResourceModel\Banners as ResourceBanners;
use Kashyap\Banners\Model\ResourceModel\Banners\CollectionFactory as BannersCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class BannersRepository implements BannersRepositoryInterface
{

    protected $dataBannersFactory;

    protected $dataObjectProcessor;

    protected $resource;

    protected $bannersFactory;

    protected $bannersCollectionFactory;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;

    protected $extensibleDataObjectConverter;
    private $storeManager;

    protected $searchResultsFactory;

    protected $dataObjectHelper;


    /**
     * @param ResourceBanners $resource
     * @param BannersFactory $bannersFactory
     * @param BannersInterfaceFactory $dataBannersFactory
     * @param BannersCollectionFactory $bannersCollectionFactory
     * @param BannersSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceBanners $resource,
        BannersFactory $bannersFactory,
        BannersInterfaceFactory $dataBannersFactory,
        BannersCollectionFactory $bannersCollectionFactory,
        BannersSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->bannersFactory = $bannersFactory;
        $this->bannersCollectionFactory = $bannersCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataBannersFactory = $dataBannersFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Kashyap\Banners\Api\Data\BannersInterface $banners
    ) {
        /* if (empty($banners->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $banners->setStoreId($storeId);
        } */
        
        $bannersData = $this->extensibleDataObjectConverter->toNestedArray(
            $banners,
            [],
            \Kashyap\Banners\Api\Data\BannersInterface::class
        );
        
        $bannersModel = $this->bannersFactory->create()->setData($bannersData);
        
        try {
            $this->resource->save($bannersModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the banners: %1',
                $exception->getMessage()
            ));
        }
        return $bannersModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($bannersId)
    {
        $banners = $this->bannersFactory->create();
        $this->resource->load($banners, $bannersId);
        if (!$banners->getId()) {
            throw new NoSuchEntityException(__('Banners with id "%1" does not exist.', $bannersId));
        }
        return $banners->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->bannersCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Kashyap\Banners\Api\Data\BannersInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Kashyap\Banners\Api\Data\BannersInterface $banners
    ) {
        try {
            $bannersModel = $this->bannersFactory->create();
            $this->resource->load($bannersModel, $banners->getBannersId());
            $this->resource->delete($bannersModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Banners: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($bannersId)
    {
        return $this->delete($this->get($bannersId));
    }
}

