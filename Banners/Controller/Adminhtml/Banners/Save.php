<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Controller\Adminhtml\Banners;

use Magento\Framework\Exception\LocalizedException;
use Kashyap\Banners\Model\ImageUploader;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ImageUploader $imageUploader,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('banners_id');
        
            $model = $this->_objectManager->create(\Kashyap\Banners\Model\Banners::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Banners no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            
            if ($data['store_views']) {
                $data['store_views'] = implode(',', $data['store_views']);
            }

            if (isset($data['bannerimage'][0]['name']) && isset($data['bannerimage'][0]['tmp_name'])) {
                $data['bannerimage'] = $data['bannerimage'][0]['name'];
                $this->imageUploader->moveFileFromTmp($data['bannerimage']);
            } elseif (isset($data['bannerimage'][0]['name']) && !isset($data['bannerimage'][0]['tmp_name'])) {
                $data['bannerimage'] = $data['bannerimage'][0]['name'];
            } else {
                $data['bannerimage'] = '';
            }
        
            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Banners.'));
                $this->dataPersistor->clear('kashyap_banners_banners');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['banners_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Banners.'));
            }
        
            $this->dataPersistor->set('kashyap_banners_banners', $data);
            return $resultRedirect->setPath('*/*/edit', ['banners_id' => $this->getRequest()->getParam('banners_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

