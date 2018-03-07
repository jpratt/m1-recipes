<?php

$installer = $this;

$installer->startSetup();

$installer->run("

ALTER TABLE {$this->getTable('recipe_ingredient')} ADD `sku` varchar(255) NULL DEFAULT NULL; 
ALTER TABLE {$this->getTable('recipe_ingredient')} ADD `store_ids` varchar(255) NULL DEFAULT NULL;

")->endSetup();