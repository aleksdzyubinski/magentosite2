<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 14.11.2016
 * Time: 11:06
 */

class Snowcore_Blog_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function submitTestimonialsAction()
{
    $customerData = Mage::getSingleton('customer/session')->getCustomer();
    $customerId = $customerData->getId();

    $testimonialText = Mage::app()->getRequest()->getParam('textareaTestimonialName');

    $date = Mage::getModel('core/date')->date();

    if(strlen($testimonialText)>0) {
        $data = array('content' => $testimonialText, 'created_date' => $date, 'customer_id' => $customerId);
        $model = Mage::getModel('blog/article');
        try {
            $model->setData($data)->save();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    $this->_redirectUrl('/blog/');
}
}