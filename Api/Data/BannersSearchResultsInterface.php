<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_Banners
*/

namespace Kashyap\Banners\Api\Data;

interface BannersSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Banners list.
     * @return \Kashyap\Banners\Api\Data\BannersInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \Kashyap\Banners\Api\Data\BannersInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

