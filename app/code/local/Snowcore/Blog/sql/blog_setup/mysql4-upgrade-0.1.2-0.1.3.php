<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.11.2016
 * Time: 16:24
 */
$installer = $this;

$installer->startSetup();


$installer->getConnection()
    ->addColumn($installer->getTable('blog_articles'), 'is_active', array(
        'type' => Varien_Db_Ddl_Table::TYPE_BOOLEAN,
        'nullable' => false,
        'default' => false,
        'after' => 'customer_id',
        'comment' => 'Active',
    ));

$installer->endSetup();