<?php
namespace AVATOR\News\Block\Adminhtml\News\Edit;

/**
 * Adminhtml news edit form
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Init form
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('news_form');
        $this->setTitle(__('News Information'));
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \AVATOR\News\Model\News $model */
        $model = $this->_coreRegistry->registry('news_news');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('news_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }

        $fieldset->addField(
            'title',
            'text',
            ['name' => 'title', 'label' => __('News Title'), 'title' => __('News Title'), 'required' => true]
        );

//        $fieldset->addField(
//            'url',
//            'text',
//            [
//                'name' => 'url',
//                'label' => __('URL Key'),
//                'title' => __('URL Key'),
//                'required' => true,
//                'class' => 'validate-xml-identifier'
//            ]
//        );

        $fieldset->addField(
            'is_active',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Status'),
                'name' => 'is_active',
                'required' => true,
                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
            ]
        );
        if (!$model->getId()) {
            $model->setData('is_active', '1');
        }

        $fieldset->addField(
            'short_description',
            'editor',
            [
                'name' => 'short_description',
                'label' => __('Short description'),
                'title' => __('Short description'),
                'style' => 'height:18em',
                'required' => true
            ]
        );

        $fieldset->addField(
            'description',
            'editor',
            [
                'name' => 'Description',
                'label' => __('Description'),
                'title' => __('Description'),
                'style' => 'height:36em',
                'required' => true
            ]
        );



        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}