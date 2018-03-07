<?php

class Iuvo_Recipe_Block_Adminhtml_Recipe_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('recipeGrid');
      $this->setDefaultSort('id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('recipe/recipe')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      
//	  Other Columns: action, entity_id, etc...
  	
      $this->addColumn('title', array(
          'header'    => Mage::helper('recipe')->__('Name'),
          'align'     =>'left',
      	  'width'     => '200px',
          'index'     => 'title',
      ));
      $this->addColumn('servings', array(
			'header'    => Mage::helper('recipe')->__('Servings'),
      		'align'     =>'left',
      		'width'     => '50px',
			'index'     => 'servings',
      ));
      
      $this->addColumn('prep_time', array(
			'header'    => Mage::helper('recipe')->__('Prep Time'),
      		'width'    => '75px',
      		'align'     =>'left',
			'index'     => 'prep_time',
      ));   
      $this->addColumn('difficulty', array(
          'header'    => Mage::helper('recipe')->__('Difficulty'),
          'align'     => 'left',
          'width'     => '65px',
          'index'     => 'difficulty',
          'type'      => 'options',
          'options'   => array(
              1 => 'Easy',
              2 => 'Moderate',
              3 => 'Hard',
          ),
      ));
      $this->addColumn('featured', array(
          'header'    => Mage::helper('recipe')->__('Featured'),
          'align'     => 'left',
          'width'     => '65px',
          'index'     => 'featured',
          'type'      => 'options',
          'options'   => array(
              0 => 'No',
              1 => 'Yes',
          ),
      ));
      
      $this->addColumn('status', array(
          'header'    => Mage::helper('recipe')->__('Status'),
          'align'     => 'left',
          'width'     => '65px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'In Draft',
              2 => 'Published',
          ),
      ));

      $this->addColumn('date_time', array(
			'header'    => Mage::helper('recipe')->__('Created'),
      		'align'     =>'right',
      		'width'     => '65px',
      		'type'      => 'datetime',
			'index'     => 'date_time',
      ));
	  
		$this->addExportType('*/*/exportCsv', Mage::helper('recipe')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('recipe')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('recipe');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('recipe')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('recipe')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('recipe/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('recipe')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('recipe')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}