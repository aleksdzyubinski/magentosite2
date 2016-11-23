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
        echo '<h1>Тут будет форма для редактирования отзывов</h1>';

        $helper = Mage::helper('blog');
        $model = Mage::registry('current_article');

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'id' => $this->getRequest()->getParam('id')
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        $this->setForm($form);

        $fieldset = $form->addFieldset('news_form', array('legend' => $helper->__('Testimonial Information')));

        $fieldset->addField('content', 'textarea', array(
            'label' => Mage::helper('blog/article')->__('Content'),
            'required' => true,
            'name' => 'content',
        ));

        $fieldset->addField('created_date', 'text', array(
            'label' => Mage::helper('blog/article')->__('Created Date'),
            'required' => false,
            'disabled'=> 'disabled',
            'name' => 'created_date',
        ));


        $fieldset->addField('customer_id', 'text', array(
            'label' => Mage::helper('blog/article')->__('Customers name'),
            'required' => false,
            'disabled'=> 'disabled',
            'name' => 'customer_id',
        ));

        $form->setUseContainer(true);

        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $form->setValues($data);
        } else {
            $form->setValues($model->getData());
        }

        return parent::_prepareForm();

    }

}