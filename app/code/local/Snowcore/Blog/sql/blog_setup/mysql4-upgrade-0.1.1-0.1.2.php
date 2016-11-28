<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28.11.2016
 * Time: 10:15
 */
$installer = $this;

$installer->startSetup();

$installer->run("
ALTER TABLE {$this->getTable('blog_articles')}
    ADD CONSTRAINT `FK_BLOG_ARTICLES_KEY` FOREIGN KEY (`customer_id`)
    REFERENCES {$this->getTable('customer_entity')} (`entity_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE;
");

$installer->endSetup();