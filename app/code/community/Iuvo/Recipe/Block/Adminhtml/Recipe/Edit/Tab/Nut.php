<?php
class Iuvo_Recipe_Block_Adminhtml_Recipe_Edit_Tab_Nut extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('recipe_form', array('legend'=>Mage::helper('recipe')->__('Nutritional Details')));

      $fieldset->addField('calories', 'text', array(
          'label'     => Mage::helper('recipe')->__('The number of calories'),
          'name'      => 'calories',
      ));
      
      $fieldset->addField('carbohydrate_content', 'text', array(
          'label'     => Mage::helper('recipe')->__('The number of grams of carbohydrates'),
          'name'      => 'carbohydrate_content',
      ));
      
      $fieldset->addField('cholesterol_content', 'text', array(
          'label'     => Mage::helper('recipe')->__('The number of milligrams of cholesterol'),
          'name'      => 'cholesterol_content',
      ));
      
      $fieldset->addField('fat_content', 'text', array(
          'label'     => Mage::helper('recipe')->__('The number of grams of fat'),
          'name'      => 'fat_content',
      ));
      
      $fieldset->addField('fiber_content', 'text', array(
          'label'     => Mage::helper('recipe')->__('The number of grams of fiber'),
          'name'      => 'fiber_content',
      ));
      
      $fieldset->addField('protein_content', 'text', array(
          'label'     => Mage::helper('recipe')->__('The number of grams of protein'),
          'name'      => 'protein_content',
      ));
      
      $fieldset->addField('saturated_fat_content', 'text', array(
          'label'     => Mage::helper('recipe')->__('The number of grams of saturated fat'),
          'name'      => 'saturated_fat_content',
      ));
      
      $fieldset->addField('serving_size', 'text', array(
          'label'     => Mage::helper('recipe')->__('The serving size, in terms of the number of volume or mass'),
          'name'      => 'serving_size',
      ));
      
      $fieldset->addField('sodium_content', 'text', array(
          'label'     => Mage::helper('recipe')->__('The number of milligrams of sodium'),
          'name'      => 'sodium_content',
      ));
      
      $fieldset->addField('sugar_content', 'text', array(
          'label'     => Mage::helper('recipe')->__('The number of grams of sugar'),
          'name'      => 'sugar_content',
      ));
      
      $fieldset->addField('trans_fat_content', 'text', array(
          'label'     => Mage::helper('recipe')->__('The number of grams of trans fat'),
          'name'      => 'trans_fat_content',
      ));
      
      $fieldset->addField('unsaturated_fat_content', 'text', array(
          'label'     => Mage::helper('recipe')->__('The number of grams of unsaturated fat'),
          'name'      => 'unsaturated_fat_content',
      ));
      if ( Mage::getSingleton('adminhtml/session')->getRecipesData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getRecipesData());
          Mage::getSingleton('adminhtml/session')->setRecipesData(null);
      } elseif ( Mage::registry('recipe_data') ) {
          $form->setValues(Mage::registry('recipe_data')->getData());
      }
      return parent::_prepareForm();
  }
}