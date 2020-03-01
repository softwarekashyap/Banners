<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Kashyap\Banners\Model\Banners as ModelBanners;

/**
 * Cms page grid inline edit controller
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class InlineEdit extends \Magento\Backend\App\Action
{
    /** @var PostDataProcessor */
    protected $dataProcessor;
    protected $BannersModel;
    protected $jsonFactory;

    
    
    public function __construct(
        Context $context,
        PostDataProcessor $dataProcessor,
        ModelBanners $BannersModel,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->dataProcessor = $dataProcessor;
        $this->BannersModel = $BannersModel;
        $this->jsonFactory = $jsonFactory;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Kashyap_Banners::banners');
    }
    
    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        $postItems = $this->getRequest()->getParam('items', []);
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }

        foreach (array_keys($postItems) as $Id) {
            /** @var \Magento\Cms\Model\Page $page */
            $Banners = $this->BannersModel->load($Id);
            try {
                $Data = $this->filterPost($postItems[$Id]);
                $this->validatePost($Data, $Banners, $error, $messages);
                $extendedPageData = $Banners->getData();
                $this->setBannersData($Banners, $extendedPageData, $Data);
                
                $this->BannersModel->save($Banners);
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $messages[] = $this->getErrorWithPageId($Banners, $e->getMessage());
                $error = true;
            } catch (\RuntimeException $e) {
                $messages[] = $this->getErrorWithPageId($Banners, $e->getMessage());
                $error = true;
            } catch (\Exception $e) {
                $messages[] = $this->getErrorWithPageId(
                    $Banners,
                    __('Something went wrong while saving the item.')
                );
                $error = true;
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }

    /**
     * Filtering posted data.
     *
     * @param array $postData
     * @return array
     */
    protected function filterPost($postData = [])
    {
        //$pageData = $this->dataProcessor->filter($postData);
       
        return $postData;
    }

    /**
     * Validate post data
     *
     * @param array $pageData
     * @param \Magento\Cms\Model\Page $page
     * @param bool $error
     * @param array $messages
     * @return void
     */
    protected function validatePost(array $pageData, ModelBanners $page, &$error, array &$messages)
    {
        if (!($this->dataProcessor->validate($pageData) && $this->dataProcessor->validateRequireEntry($pageData))) {
            $error = true;
            foreach ($this->messageManager->getMessages(true)->getItems() as $error) {
                $messages[] = $this->getErrorWithPageId($page, $error->getText());
            }
        }
    }

    /**
     * Add page title to error message
     *
     * @param PageInterface $page
     * @param string $errorText
     * @return string
     */
    protected function getErrorWithPageId(ModelBanners $page, $errorText)
    {
        return '[Page ID: ' . $page->getId() . '] ' . $errorText;
    }

    /**
     * Set cms page data
     *
     * @param \Magento\Cms\Model\Page $page
     * @param array $extendedPageData
     * @param array $pageData
     * @return $this
     */
    public function setBannersData(ModelBanners $page, array $extendedPageData, array $pageData)
    {
        $page->setData(array_merge($page->getData(), $extendedPageData, $pageData));
        return $this;
    }
}
