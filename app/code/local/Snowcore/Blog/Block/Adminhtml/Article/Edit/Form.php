<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 16.11.2016
 * Time: 17:24
 */
class Snowcore_Blog_Block_Adminhtml_Article_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $model = Mage::registry('current_article');

        $form = new Varien_Data_Form();

        $this->setForm($form);

        $fieldset = $form->addFieldset('article_form', array('legend' => Mage::helper('blog/article')->__('Articles Information')));


        $fieldset->addField('content', 'textarea', array(
            'label' => Mage::helper('blog/article')->__('Content'),
            'required' => true,
            'name' => 'content',
        ));

        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));
        $form->setValues($model->getData());

        $this->setForm($form);
    }

}