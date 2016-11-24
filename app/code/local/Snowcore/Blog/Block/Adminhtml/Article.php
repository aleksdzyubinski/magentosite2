<?php
class Snowcore_Blog_Block_Adminhtml_Article extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_blockGroup = 'blog';
        $this->_controller = 'adminhtml_article';
        $this->_headerText = Mage::helper('blog/article')->__('Testimonials Management');
        //$this->removeButton('add');

    }
}