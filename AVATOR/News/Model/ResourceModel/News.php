<?php
namespace AVATOR\News\Model\ResourceModel;

/**
 * News mysql resource
 */
class News extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $_date;

    /**
     * Construct
     *
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     * @param string|null $resourcePrefix
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        $resourcePrefix = null
    ) {
        parent::__construct($context, $resourcePrefix);
        $this->_date = $date;
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('avator_news', 'id');
    }

    /**
     * Process news data before saving
     *
     * @param \Magento\Framework\Model\AbstractModel $object
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
    {

        if ($object->isObjectNew() && !$object->hasCreatedAt()) {
            $object->setCreatedAt($this->_date->gmtDate());
        }

        $object->setUpdatedAt($this->_date->gmtDate());

        return parent::_beforeSave($object);
    }

    /**
     * Load an object using 'url' field if there's no field specified and value is not numeric
     *
     * @param \Magento\Framework\Model\AbstractModel $object
     * @param mixed $value
     * @param string $field
     * @return $this
     */
    public function load(\Magento\Framework\Model\AbstractModel $object, $value, $field = null)
    {
        if (!is_numeric($value) && is_null($field)) {
            $field = 'url';
        }

        return parent::load($object, $value, $field);
    }

    /**
     * Retrieve select object for load object data
     *
     * @param string $field
     * @param mixed $value
     * @param \AVATOR\News\Model\News $object
     * @return \Zend_Db_Select
     */
    protected function _getLoadSelect($field, $value, $object)
    {
        $select = parent::_getLoadSelect($field, $value, $object);
// @todo in adminhtml not show not active news
//        $select->where('is_active = ?', 1)->limit(1);

        return $select;
    }

    /**
     * Retrieve load select with filter by url and activity
     *
     * @param string $url
     * @param int $isActive
     * @return \Magento\Framework\DB\Select
     */
    protected function _getLoadByUrlKeySelect($url, $isActive = null)
    {
        $select = $this->_getReadAdapter()->select()->from(
            ['an' => $this->getMainTable()]
        )->where('an.url = ?', $url);

        if (!is_null($isActive)) {
            $select->where('an.is_active = ?', $isActive);
        }

        return $select;
    }

}
