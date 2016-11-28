<?php
class Snowcore_Blog_Model_Article extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('blog/article');
    }

    public function getAllOptions()
    {
        $customerData = Mage::getModel('customer/customer')->getCollection();
        //$collection = Mage::getModel('blog/article')->getCollection();
        $options = array();

        foreach ($customerData as $item){
            $customer = Mage::getModel('customer/customer')->load($item->getId());
            $options[$item->getId()] = $customer->getName();
        }
        return $options;


    }

}