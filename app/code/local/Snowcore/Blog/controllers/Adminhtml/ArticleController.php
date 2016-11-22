<?php
class Snowcore_Blog_Adminhtml_ArticleController extends Mage_Adminhtml_Controller_Action
{
    /*protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('blog/article')
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('Articles Manager'), Mage::helper('adminhtml')->__('Articles Manager'));
        return $this;
    }*/

    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('articles');
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_articles'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        Mage::register('current_article', Mage::getModel('blog/article')->load($id));

        $this->loadLayout()->_setActiveMenu('blog');
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_articles'));
        $this->renderLayout();
    }


    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('blog/article')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('News was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $news = $this->getRequest()->getParam('articles', null);

        if (is_array($news) && sizeof($news) > 0) {
            try {
                foreach ($news as $id) {
                    Mage::getModel('blog/article')->setId($id)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d news have been deleted', sizeof($news)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select testimonials'));
        }
        $this->_redirect('*/*');
    }

}
