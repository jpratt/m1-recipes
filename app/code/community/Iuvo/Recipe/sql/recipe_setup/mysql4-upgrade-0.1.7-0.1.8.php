<?php

$installer = $this;

$installer->startSetup();

$installer->run("

ALTER TABLE {$this->getTable('recipe_ingredient')} ADD `qty` int(11) NULL DEFAULT NULL; 

")->endSetup();