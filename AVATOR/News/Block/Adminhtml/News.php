<?php
namespace AVATOR\News\Block\Adminhtml;

class News extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_news';
        $this->_blockGroup = 'AVATOR_News';
        $this->_headerText = __('Manage News');

        parent::_construct();

        if ($this->_isAllowedAction('AVATOR_News::save')) {
            $this->buttonList->update('add', 'label', __('Add New News'));
        } else {
            $this->buttonList->remove('add');
        }
    }

    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}