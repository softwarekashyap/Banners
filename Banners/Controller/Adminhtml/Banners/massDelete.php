<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (softwarekashyap@gmail.com)
 * @website https://www.kashyapsoftware.com/
 * @package Kashyap_Banners

 * @var $block \Kashyap\Banners\Block\Banners
*/

namespace Kashyap\Banners\Controller\Adminhtml\Banners;

use Kashyap\Banners\Model\ResourceModel\Banners\CollectionFactory;
use Kashyap\Banners\Model\Banners;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;

class MassDelete extends \Magento\Backend\App\Action
{
    protected $filter;
    protected $collectionFactory;
    protected $banners;
    protected $selectedAppsid;

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        Banners $banners
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->banners = $banners;
        parent::__construct($context);
    }

    public function execute()
    {
        $banners = $this->collectionFactory->create();
        foreach ($banners as $value) {
            $templateId[] = $value['banners_id'];
        }

        $parameterData = $this->getRequest()->getParams('banners_id');
        if (array_key_exists("selected", $parameterData)) {
            $selectedAppsid = $parameterData['selected'];
        }
        if (array_key_exists("excluded", $parameterData)) {
            if ($parameterData['excluded'] == 'false') {
                $selectedAppsid = $templateId;
            } else {
                $selectedAppsid = array_diff($templateId, $parameterData['excluded']);
            }
        }
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('banners_id', ['in' => $selectedAppsid]);
        $delete = 0;
        $model = [];
        foreach ($collection as $item) {
            $this->deleteById($item->getId());
            $delete++;
        }
        $this->messageManager->addSuccess(__('A total of %1 Records have been deleted.', $delete));
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }

    public function deleteById($id)
    {
        $item = $this->banners->load($id);
        $item->delete();
    }
}