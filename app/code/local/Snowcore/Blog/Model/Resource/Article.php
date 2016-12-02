<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02.12.2016
 * Time: 16:04
 */
class Snowcore_Blog_Model_Resource_Article extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('blog/article', 'article_id');
    }

    protected function _beforeSave(Mage_Core_Model_Abstract $object)
    {

    }
}