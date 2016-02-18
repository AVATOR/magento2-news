<?php

namespace AVATOR\News\Api\Data;
use Magento\Framework\Api\SearchResultsInterface;
/**
 * Interface for cms page search results.
 * @api
 */
interface PostSearchResultsInterface extends SearchResultsInterface
{

    /**
     * Get pages list.
     *
     * @return \AVATOR\News\Api\Data\NewsInterface[]
     */
    public function getItems();

    /**
     * Set pages list.
     *
     * @param \AVATOR\News\Api\Data\NewsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}