<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 16.11.2016
 * Time: 17:18
 */
class Snowcore_Blog_Block_Adminhtml_Article_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'blog';
        $this->_controller = 'adminhtml_article';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('blog');
        $model = Mage::registry('current_article');

        if ($model->getId()) {
            return $helper->__("Editing testimonial number '%s'", $this->escapeHtml($model->getId()));
        } else {
            return $helper->__("Add a new testimonial");
        }

    }

}