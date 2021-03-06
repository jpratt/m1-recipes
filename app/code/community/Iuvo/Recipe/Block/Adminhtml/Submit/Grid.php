<?php

class Iuvo_Recipe_Block_Adminhtml_Submit_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('submitGrid');
      $this->setDefaultSort('id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('recipe/submit')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      
//	  Other Columns: action, entity_id, etc...
  	
      $this->addColumn('fname', array(
          'header'    => Mage::helper('recipe')->__('First Name'),
          'align'     =>'left',
          'index'     => 'fname',
      ));
      $this->addColumn('lname', array(
          'header'    => Mage::helper('recipe')->__('Last Name'),
          'align'     =>'left',
          'index'     => 'lname',
      ));
      
      $this->addColumn('email', array(
          'header'    => Mage::helper('recipe')->__('Email'),
          'align'     =>'left',
          'index'     => 'email',
      ));
      $this->addColumn('title', array(
          'header'    => Mage::helper('recipe')->__('Title'),
          'align'     =>'left',
          'width'     => '150px',
          'index'     => 'title',
      ));

      $this->addColumn('type', array(
			'header'    => Mage::helper('recipe')->__('Dish Type'),
      		'width'    => '75px',
      		'align'     =>'left',
			'index'     => 'type',
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


      

      $this->addColumn('created_at', array(
			'header'    => Mage::helper('recipe')->__('Created'),
      		'align'     =>'right',
      		'width'     => '65px',
      		'type'      => 'datetime',
			'index'     => 'created_at',
      ));
	  
/*
		$this->addExportType('*\/*\/exportCsv', Mage::helper('recipe')->__('CSV'));
		$this->addExportType('*\/*\/exportXml', Mage::helper('recipe')->__('XML'));
*/
	  
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