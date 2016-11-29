<?php
class Snowcore_Blog_Block_Adminhtml_Article_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('articleGrid');
        $this->setDefaultSort('article_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('blog/article')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('article_id', array(
         'header'    => Mage::helper('blog')->__('ID'),
         'align'     => 'center',
         'width'     => '50px',
         'index'     => 'article_id',
        ));

        $this->addColumn('title', array(
         'header'    => Mage::helper('blog')->__('Content'),
         'align'     => 'left',
         'index'     => 'content',
        ));

        $this->addColumn('created_date', array(
            'header'    => Mage::helper('blog')->__('Created'),
            'align'     => 'right',
            'width'     => '150px',
            'index'     => 'created_date',
        ));

        $this->addColumn('is_active', array(
            'header'    => Mage::helper('blog')->__('Active Status'),
            'align'     => 'right',
            'width'     => '100px',
            'index'     => 'is_active',
        ));
        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('article_id');
        $this->getMassactionBlock()->setFormFieldName('article');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
        ));
        return $this;
    }

    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array('id' => $model->getId()));
    }
}
