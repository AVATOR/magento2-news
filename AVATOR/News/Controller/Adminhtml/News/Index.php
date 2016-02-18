<?php
namespace AVATOR\News\Controller\Adminhtml\News;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'AVATOR_News::news';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('AVATOR_News::news');
        $resultPage->addBreadcrumb(__('News'), __('News'));
        $resultPage->addBreadcrumb(__('Manage News'), __('Manage News'));
        $resultPage->getConfig()->getTitle()->prepend(__('News'));

        return $resultPage;
    }
}