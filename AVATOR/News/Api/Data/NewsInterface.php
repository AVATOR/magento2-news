<?php

namespace AVATOR\News\Api\Data;

/**
 * News interface.
 *
 * @api
 */
interface NewsInterface
{
    /**
     * Get ID.
     *
     * @return int
     */
    public function getId();

    /**
     * Set ID.
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set title.
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Get short description.
     *
     * @return string
     */
    public function getShortDescription();

    /**
     * Set short description.
     *
     * @param string $shortDescription
     * @return $this
     */
    public function setShortDescription($shortDescription);

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set description.
     *
     * @param string $text
     * @return $this
     */
    public function setDescription($description);

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl();

    /**
     * Set url.
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url);

    /**
     * Get news record creation date.
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * Set news record creation date.
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Get news record modification date.
     *
     * @return string
     */
    public function getUpdatedAt();

    /**
     * Set news record modification date.
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Check if news is active.
     *
     * @return int
     */
    public function getIsActive();

    /**
     * Set if news is active.
     *
     * @param int $isActive
     * @return $this
     */
    public function setIsActive($isActive);
}
