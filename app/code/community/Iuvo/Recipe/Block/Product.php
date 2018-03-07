<?php
 
class Iuvo_Recipe_Block_Product extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        parent::_construct();
    }
    
    public function getProductRecipes()
    {
    	$product = Mage::registry('product');
    	$collection = Mage::getModel('recipe/recipe')->getCollection()
    		->addFieldToFilter('sku', $product->getSku())
    		->addFieldToFilter('product_show', '1');
    	$collection->getSelect()
    		->join(array('ingredients'=>'recipe_ingredient'),
    			'main_table.recipe_id = ingredients.recipe_entity_id')
    		->distinct('main_table.recipe_id')
    		->limit(4);

    	return $collection;
    }
}