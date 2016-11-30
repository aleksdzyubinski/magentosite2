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
        /*
         * $customerData = Mage::getSingleton('customer/session')->getCustomer();
        $testimonialText = Mage::app()->getRequest()->getParam('textareaTestimonialName');
        $date = Mage::getModel('core/date')->date();

        echo '<script>';
        echo 'console.log('. json_encode( $testimonialText ) .')';
        echo '</script>';

        $valid = new Zend_Validate_NotEmpty();
        if($valid->isValid($testimonialText))
        {
            $data = array('content' => $testimonialText, 'created_date' => $date, 'customer_id' => $customerData->getId());
            $model = Mage::getModel('blog/article');
            try {
                $model->setData($data)->save();
                //
                //$result = "success";
                //echo json_decode($result);
                $this->getResponse()->setBody(true);
                return;

            } catch (Exception $e) {
                echo $e->getMessage();
            }

        }
        else{
            //$this->getResponse()->setBody(false);
            //return;
            $result = "Enter testimonial";
            echo json_decode($result);
        }
        */
        echo '<script>';
        echo 'console.log("teeeest")';
        echo '</script>';
        $this->getResponse()->setBody(true);
        return;
        //$this->_redirectUrl('/blog/');
        //return json_last_error_msg()

    }
}