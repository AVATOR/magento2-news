<?php

namespace AVATOR\News\Controller\View;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{

    /** @var  PageFactory */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    /**
     * @return PageFactory
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \AVATOR\News\Helper\View $newsHelper */
        $newsHelper = $this->_objectManager->get('AVATOR\News\Helper\View');
        $resultPage = $newsHelper->prepareResultNews($this, $id);
        if (!$resultPage) {
            $resultForward = $this->resultForwardFactory->create();
            return $resultForward->forward('noroute');
        }
        return $resultPage;
    }

}
