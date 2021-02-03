<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Ui\Component\Listing\Column;

use Magento\Catalog\Helper\Image;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Thumbnail extends Column
{

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param Image $imageHelper
     * @param UrlInterface $urlBuilder
     * @param StoreManagerInterface $storeManager
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Image $imageHelper,
        UrlInterface $urlBuilder,
        StoreManagerInterface $storeManager,
        \Magento\Framework\View\Asset\Repository $assetRepo,
        array $components = [],
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->imageHelper = $imageHelper;
        $this->urlBuilder = $urlBuilder;
        $this->_assetRepo = $assetRepo;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach($dataSource['data']['items'] as &$item) {
                $url = '';
                if($item['bannerimage'] != '') {
                    $url = $this->storeManager->getStore()->getBaseUrl(
                        UrlInterface::URL_TYPE_MEDIA
                    ) . 'banners/' . $item['bannerimage'];
                } else {
                    $url = $this->_assetRepo->getUrl('Kashyap_Banners::image/YouTubeIcon.png');
                }
                $item['bannerimage_src'] = $url;
                $item['bannerimage_orig_src'] = $url;
                $item['bannerimage_link'] = $this->urlBuilder->getUrl(
                    'kashyap_banners/banners/edit',
                    ['banners_id' => $item['banners_id']]
                );
            }
        }

        return $dataSource;
    }
}