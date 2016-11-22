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
        $this->_blockGroup = 'blog/article'; //???????
        $this->_controller = 'adminhtml_articles';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('blog/article'); //??????????
        $model = Mage::registry('current_article');

        if ($model->getId()) {
            return $helper->__("Edit Article item '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add Article item");
        }
    }

}