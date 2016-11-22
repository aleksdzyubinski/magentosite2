<?php
$installer = $this;

$installer->startSetup();

$installer->run(" 
DROP TABLE IF EXISTS {$this->getTable('blog_articles')};
CREATE TABLE {$this->getTable('blog_articles')} (
 `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `content` text,
 `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

$installer->endSetup();