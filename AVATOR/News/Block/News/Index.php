<?php
namespace AVATOR\News\Block\News;

class Index extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \AVATOR\News\Model\ResourceModel\News\Collection $newsCollection,
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \AVATOR\News\Model\ResourceModel\News\CollectionFactory $newsCollection,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_newsCollection = $newsCollection;
    }

    /**
     * @return \AVATOR\News\Model\ResourceModel\News\Collection
     */
    public function getNews()
    {
        // Check if news has already been defined
        // makes our block nice and re-usable! We could
        // pass the 'news' data to this block, with a collection
        // that has been filtered differently!
        if (!$this->hasData('news')) {
            $news = $this->_newsCollection
                ->create()
//                ->addOrder(
//                    NewsInterface::CREATION_TIME,
//                    NewsCollection::SORT_ORDER_DESC
//                )
            ;
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
        return [\AVATOR\News\Model\News::CACHE_TAG . '_' . 'index'];
    }

}
