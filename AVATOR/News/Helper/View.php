<?php

namespace AVATOR\News\Helper;

use Magento\Framework\App\Action\Action;

class View extends \Magento\Framework\App\Helper\AbstractHelper
{

    /**
     * @var \AVATOR\News\Model\News
     */
    protected $_news;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \AVATOR\News\Model\News $news
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \AVATOR\News\Model\News $news,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->_news = $news;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Return a news from given news id.
     *
     * @param Action $action
     * @param null $newsId
     * @return \Magento\Framework\View\Result\Page|bool
     */
    public function prepareResultNews(Action $action, $newsId = null)
    {
        $this->_news = $this->_news->load($newsId);

        if (!$this->_news->getId()) {
            return false;
        }

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->addHandle('news_view_index');

        $resultPage->addPageLayoutHandles(['id' => $this->_news->getId()]);

        $this->_eventManager->dispatch(
            'avator_news_view_render',
            ['news' => $this->_news, 'controller_action' => $action]
        );

        return $resultPage;
    }
}