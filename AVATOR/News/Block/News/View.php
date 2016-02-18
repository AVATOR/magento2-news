<?php
namespace AVATOR\News\Block\News;

use AVATOR\News\Model\News;

class View extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{

    /**
     * @var News
     */
    protected $_news;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \AVATOR\News\Model\ResourceModel\News\Collection $newsCollection,
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        News $news,
        \AVATOR\News\Model\ResourceModel\News\CollectionFactory $newsCollection,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_newsCollection = $newsCollection;
        $this->_news = $news;
    }

    /**
     * @return News
     */
    public function getNews()
    {
        if (!$this->hasData('news')) {
            if ($this->getId()) {
                $news = $this->_newsCollection->create();
            } else {
                $news = $this->_news;
            }

            $this->setData('news', $news);
        }
        return $this->getData('news');
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [News::CACHE_TAG . '_' . $this->getNews()->getId() . '_' . 'view'];
    }

}
