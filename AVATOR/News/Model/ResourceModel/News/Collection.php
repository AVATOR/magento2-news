<?php

namespace AVATOR\News\Model\ResourceModel\News;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AVATOR\News\Model\News', 'AVATOR\News\Model\ResourceModel\News');
    }
}
