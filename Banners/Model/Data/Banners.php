<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/


namespace Kashyap\Banners\Model\Data;

use Kashyap\Banners\Api\Data\BannersInterface;

class Banners extends \Magento\Framework\Api\AbstractExtensibleObject implements BannersInterface
{

    /**
     * Get banners_id
     * @return string|null
     */
    public function getBannersId()
    {
        return $this->_get(self::BANNERS_ID);
    }

    /**
     * Set banners_id
     * @param string $bannersId
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setBannersId($bannersId)
    {
        return $this->setData(self::BANNERS_ID, $bannersId);
    }

    /**
     * Get title
     * @return string|null
     */
    public function getTitle()
    {
        return $this->_get(self::TITLE);
    }

    /**
     * Set title
     * @param string $title
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Kashyap\Banners\Api\Data\BannersExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Kashyap\Banners\Api\Data\BannersExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Kashyap\Banners\Api\Data\BannersExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get description
     * @return string|null
     */
    public function getDescription()
    {
        return $this->_get(self::DESCRIPTION);
    }

    /**
     * Set description
     * @param string $description
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get store_views
     * @return string|null
     */
    public function getStoreViews()
    {
        return $this->_get(self::STORE_VIEWS);
    }

    /**
     * Set store_views
     * @param string $storeViews
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setStoreViews($storeViews)
    {
        return $this->setData(self::STORE_VIEWS, $storeViews);
    }

    /**
     * Get bannerimage
     * @return string|null
     */
    public function getBannerimage()
    {
        return $this->_get(self::BANNERIMAGE);
    }

    /**
     * Set bannerimage
     * @param string $bannerimage
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setBannerimage($bannerimage)
    {
        return $this->setData(self::BANNERIMAGE, $bannerimage);
    }

    /**
     * Get link
     * @return string|null
     */
    public function getLink()
    {
        return $this->_get(self::LINK);
    }

    /**
     * Set link
     * @param string $link
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setLink($link)
    {
        return $this->setData(self::LINK, $link);
    }

    /**
     * Get target
     * @return string|null
     */
    public function getTarget()
    {
        return $this->_get(self::TARGET);
    }

    /**
     * Set target
     * @param string $target
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setTarget($target)
    {
        return $this->setData(self::TARGET, $target);
    }

    /**
     * Get sort_order
     * @return string|null
     */
    public function getSortOrder()
    {
        return $this->_get(self::SORT_ORDER);
    }

    /**
     * Set sort_order
     * @param string $sortOrder
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setSortOrder($sortOrder)
    {
        return $this->setData(self::SORT_ORDER, $sortOrder);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get created_time
     * @return string|null
     */
    public function getCreatedTime()
    {
        return $this->_get(self::CREATED_TIME);
    }

    /**
     * Set created_time
     * @param string $createdTime
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setCreatedTime($createdTime)
    {
        return $this->setData(self::CREATED_TIME, $createdTime);
    }

    /**
     * Get update_time
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->_get(self::UPDATE_TIME);
    }

    /**
     * Set update_time
     * @param string $updateTime
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }
}

