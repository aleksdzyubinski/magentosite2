<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.12.2016
 * Time: 12:14
 */
class Snowcore_Blog_Model_Observer
{
    public function sendSuccessEmail($observer){
        $emailTemplate  = Mage::getModel('core/email_template')
            ->loadDefault('testimonials_email_template');

        $event = $observer->getEvent();

        $data = array();
        $data['name'] = $event->getCustomer()->getName();
        $data['comment'] = $event->getComment();

        $processedTemplate = $emailTemplate->getProcessedTemplate($data);

        $mail = Mage::getModel('core/email')
            ->setToEmail('aleks_dzyubinski@list.ru')
            ->setBody($processedTemplate)
            ->setFromEmail('aleksdzyubinski@gmail.com')
            ->setFromName('Magentosite')
            ->setType('html');

        try{
            $mail->send();
        }
        catch(Exception $error)
        {
            Mage::getSingleton('core/session')->addError($error->getMessage());
            return false;
        }

	}
}