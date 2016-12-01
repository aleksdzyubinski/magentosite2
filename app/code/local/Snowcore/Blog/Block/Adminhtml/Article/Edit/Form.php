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
            'label' => Mage::helper('blog')->__('Content'),
            'required' => true,
            'name' => 'content',
        ));

        $dateFormatIso = Mage::app()->getLocale()->getDateFormat(
            Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
        );

        $fieldset->addField('created_date', 'date', array(
            'label' => Mage::helper('blog')->__('Created Date'),
            'required' => true,
            'name' => 'created_date',
            'style' => 'weidth: 280px',
            'image'     => $this->getSkinUrl('images/grid-cal.gif'),
            'format'    => $dateFormatIso,
        ));

        $fieldset->addField('customer_id', 'select', array(
            'label' => Mage::helper('blog')->__('Customer Name'),
            'required' => true,
            'values'    => Mage::getModel('blog/article')->getAllOptions(),
            'name' => 'customer_id',
        ));

        $fieldset->addField('is_active', 'select', array(
            'label' => Mage::helper('blog')->__('Status'),
            'required' => true,
            'values' => array('0' => 'Disabled','1' => 'Enabled'),
            'name' => 'is_active',
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