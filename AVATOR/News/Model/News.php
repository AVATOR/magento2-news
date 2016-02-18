<?php

namespace AVATOR\News\Model;

use Magento\Framework\Model\AbstractModel;
use AVATOR\News\Api\Data\NewsInterface;

/**
 * News model
 */
class News extends AbstractModel implements NewsInterface
{

    /**
     * Post's Statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'avator_news';

    /**
     * @var string
     */
    protected $_cacheTag = 'avator_news';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'avator_news';

    /**
     * Initialize user model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AVATOR\News\Model\ResourceModel\News');
    }

    /**
     * Processing data before model save
     *
     * @return $this
     */
    public function beforeSave()
    {
        $data = [];

        if ($this->getIsActive() !== null) {
            $data['is_active'] = intval($this->getIsActive());
        }

        $this->addData($data);

        return parent::beforeSave();
    }

    /**
     * Process data after model is saved
     *
     * @return $this
     */
    public function afterSave()
    {
        return parent::afterSave();
    }

    /**
     * Check if user has available resources
     *
     * @return bool
     */
    public function hasAvailableResources()
    {
        return $this->_hasResources;
    }

    /**
     * Prepare post's statuses.
     * Available event blog_post_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }

    /**
     * Set user has available resources
     *
     * @param bool $hasResources
     * @return $this
     */
    public function setHasAvailableResources($hasResources)
    {
        $this->_hasResources = $hasResources;
        return $this;
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getData('id');
    }

    /**
     * {@inheritdoc}
     */
    public function setId($id)
    {
        return $this->setData('id', $id);
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->_getData('description');
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        return $this->setData('description', $description);
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->_getData('title');
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        return $this->setData('title', $title);
    }

    /**
     * {@inheritdoc}
     */
    public function getShortDescription()
    {
        return $this->_getData('short_description');
    }

    /**
     * {@inheritdoc}
     */
    public function setShortDescription($shortDescription)
    {
        return $this->setData('short_description', $shortDescription);
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->_getData('url');
    }

    /**
     * {@inheritdoc}
     */
    public function setUrl($url)
    {
        return $this->setData('url', $url);
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt()
    {
        return $this->_getData('created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData('created_at', $createdAt);
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt()
    {
        return $this->_getData('updated_at');
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData('updated_at', $updatedAt);
    }

    /**
     * {@inheritdoc}
     */
    public function getIsActive()
    {
        return $this->_getData('is_active');
    }

    /**
     * {@inheritdoc}
     */
    public function setIsActive($isActive)
    {
        return $this->setData('is_active', $isActive);
    }

}
