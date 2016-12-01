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
        $testimonialText = $this->getRequest()->getParam('textareaTestimonialName');
        $date = Mage::getModel('core/date')->date();

        $valid = new Zend_Validate_NotEmpty();
        if($valid->isValid($testimonialText))
        {
            $data = array('content' => $testimonialText, 'created_date' => $date, 'customer_id' => $customerData->getId());
            $model = Mage::getModel('blog/article');
            try {
                $model->setData($data)->save();
                $this->getResponse()->setBody($this->__('Testimonial successfully added'));
                return;

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        else{
            $this->getResponse()->setBody($this->__('Testimonial textfield is empty'));
        }
    }
}