<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 15.11.2016
 * Time: 12:31
 */
$installer = $this;

$installer->startSetup();


$installer->getConnection()
    ->addColumn($installer->getTable('blog_articles'), 'customer_id',
    'int(10) NULL DEFAULT NULL AFTER `created_date`'
);

$installer->endSetup();