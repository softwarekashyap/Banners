<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Api\Data;

interface BannersInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const UPDATE_TIME = 'update_time';
    const BANNERIMAGE = 'bannerimage';
    const SORT_ORDER = 'sort_order';
    const DESCRIPTION = 'description';
    const LINK = 'link';
    const STORE_VIEWS = 'store_views';
    const TITLE = 'title';
    const TARGET = 'target';
    const CREATED_TIME = 'created_time';
    const BANNERS_ID = 'banners_id';
    const STATUS = 'status';

    /**
     * Get banners_id
     * @return string|null
     */
    public function getBannersId();

    /**
     * Set banners_id
     * @param string $bannersId
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setBannersId($bannersId);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setTitle($title);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Kashyap\Banners\Api\Data\BannersExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Kashyap\Banners\Api\Data\BannersExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Kashyap\Banners\Api\Data\BannersExtensionInterface $extensionAttributes
    );

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setDescription($description);

    /**
     * Get store_views
     * @return string|null
     */
    public function getStoreViews();

    /**
     * Set store_views
     * @param string $storeViews
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setStoreViews($storeViews);

    /**
     * Get bannerimage
     * @return string|null
     */
    public function getBannerimage();

    /**
     * Set bannerimage
     * @param string $bannerimage
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setBannerimage($bannerimage);

    /**
     * Get link
     * @return string|null
     */
    public function getLink();

    /**
     * Set link
     * @param string $link
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setLink($link);

    /**
     * Get target
     * @return string|null
     */
    public function getTarget();

    /**
     * Set target
     * @param string $target
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setTarget($target);

    /**
     * Get sort_order
     * @return string|null
     */
    public function getSortOrder();

    /**
     * Set sort_order
     * @param string $sortOrder
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setSortOrder($sortOrder);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setStatus($status);

    /**
     * Get created_time
     * @return string|null
     */
    public function getCreatedTime();

    /**
     * Set created_time
     * @param string $createdTime
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setCreatedTime($createdTime);

    /**
     * Get update_time
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Set update_time
     * @param string $updateTime
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setUpdateTime($updateTime);
}

