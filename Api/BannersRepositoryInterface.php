<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface BannersRepositoryInterface
{

    /**
     * Save Banners
     * @param \Kashyap\Banners\Api\Data\BannersInterface $banners
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Kashyap\Banners\Api\Data\BannersInterface $banners
    );

    /**
     * Retrieve Banners
     * @param string $bannersId
     * @return \Kashyap\Banners\Api\Data\BannersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($bannersId);

    /**
     * Retrieve Banners matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Kashyap\Banners\Api\Data\BannersSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Banners
     * @param \Kashyap\Banners\Api\Data\BannersInterface $banners
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Kashyap\Banners\Api\Data\BannersInterface $banners
    );

    /**
     * Delete Banners by ID
     * @param string $bannersId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($bannersId);
}

