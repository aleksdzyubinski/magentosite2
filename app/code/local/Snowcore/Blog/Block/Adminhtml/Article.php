<?php
class Snowcore_Blog_Block_Adminhtml_Article extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_article';
        $this->_blockGroup = 'blog';
        $this->_headerText = Mage::helper('blog/article')->__('Testimonials Manager');
        $this->_addButtonLabel = Mage::helper('blog/article')->__('Add Testimonial');
        parent::__construct();
    }
}