<?php
namespace AVATOR\News\Model\News\Source;

class IsActive implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \AVATOR\News\Model\News
     */
    protected $post;

    /**
     * Constructor
     *
     * @param \AVATOR\News\Model\News $news
     */
    public function __construct(\AVATOR\News\Model\News $news)
    {
        $this->news = $news;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->news->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}