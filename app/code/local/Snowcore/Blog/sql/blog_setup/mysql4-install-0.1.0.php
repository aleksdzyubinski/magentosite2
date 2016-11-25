<?php
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('blog_articles'))
    ->addColumn('article_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Testimonial ID')

    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
    ), 'Content')

    ->addColumn('created_date', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
        'nullable'  => false,
        //'default' => Zend_Date::now()->get('YYYY-MM-dd'),
        //'default' => Mage::getModel('core/date')->date(),
    ), 'Created Date');
$installer->getConnection()->createTable($table);

$installer->endSetup();
