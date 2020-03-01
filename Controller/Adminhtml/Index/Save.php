<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Kashyap\Banners\Model\Banners;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\TestFramework\Inspection\Exception;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\RequestInterface;

//use Magento\Framework\Stdlib\DateTime\DateTime;
//use Magento\Ui\Component\MassAction\Filter;
//use Kashyap\News\Model\ResourceModel\Test\CollectionFactory;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;
    protected $scopeConfig;
   
    protected $_escaper;
    protected $inlineTranslation;
    protected $_dateFactory;
    //protected $_modelNewsFactory;
  //  protected $collectionFactory;
   //  protected $filter;
    /**
     * @param Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        \Magento\Framework\Escaper $escaper,
        \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Stdlib\DateTime\DateTimeFactory $dateFactory
    ) {
       // $this->filter = $filter;
       // $this->collectionFactory = $collectionFactory;
        $this->dataPersistor = $dataPersistor;
         $this->scopeConfig = $scopeConfig;
         $this->_escaper = $escaper;
        $this->_dateFactory = $dateFactory;
         $this->inlineTranslation = $inlineTranslation;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('banners_id');

            if (isset($data['status']) && $data['status'] === 'true') {
                $data['status'] = Block::STATUS_ENABLED;
            }
            if (empty($data['banners_id'])) {
                $data['banners_id'] = null;
            }

           
            /** @var \Magento\Cms\Model\Block $model */
            $model = $this->_objectManager->create('Kashyap\Banners\Model\Banners')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This Banner no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            
            if (isset($data['bannerimage'][0]['name']) && isset($data['bannerimage'][0]['tmp_name'])) {
                $data['bannerimage'] ='/banners/'.$data['bannerimage'][0]['name'];
            } elseif (isset($data['bannerimage'][0]['name']) && !isset($data['image'][0]['tmp_name'])) {
                $data['bannerimage'] =$data['bannerimage'][0]['name'];
            } else {
                $data['bannerimage'] = null;
            }
           if ($data['store_views']) {
                $data['store_views'] = implode(',', $data['store_views']);
            }
            
            $model->setData($data);


            $this->inlineTranslation->suspend();
            try {
                    //////////////////// email
                $model->save();
                $this->messageManager->addSuccess(__('Banner Saved successfully'));
                $this->dataPersistor->clear('ks_banners');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['banners_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the banner.'));
            }

            $this->dataPersistor->set('ks_banners', $data);
            return $resultRedirect->setPath('*/*/edit', ['banners_id' => $this->getRequest()->getParam('banners_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
