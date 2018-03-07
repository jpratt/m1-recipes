<?php

$installer = $this;

$installer->startSetup();

$installer->run("

ALTER TABLE {$this->getTable('recipe_entity')} ADD `prep_time_unit` varchar(3) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `cook_time_unit` varchar(3) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `cook_time` int(11) NULL DEFAULT NULL;

ALTER TABLE {$this->getTable('recipe_entity')} ADD `calories` varchar(50) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `carbohydrate_content` varchar(50) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `cholesterol_content` varchar(50) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `fat_content` varchar(50) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `fiber_content` varchar(50) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `protein_content` varchar(50) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `saturated_fat_content` varchar(50) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `serving_size` varchar(50) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `sodium_content` varchar(50) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `sugar_content` varchar(50) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `trans_fat_content` varchar(50) NULL DEFAULT NULL;
ALTER TABLE {$this->getTable('recipe_entity')} ADD `unsaturated_fat_content` varchar(50) NULL DEFAULT NULL;


")->endSetup();