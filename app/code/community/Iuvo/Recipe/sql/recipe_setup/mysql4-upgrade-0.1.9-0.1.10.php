<?php

$installer = $this;

$installer->startSetup();

$installer->run("

ALTER TABLE {$this->getTable('recipe_ingredient')} ADD `product_show` tinyint NULL DEFAULT NULL;

")->endSetup();