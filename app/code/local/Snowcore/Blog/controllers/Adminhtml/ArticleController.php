<?php
class Snowcore_Blog_Adminhtml_ArticleController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout();//->_setActiveMenu('blog/article');
        //$this->_addContent($this->getLayout()->createBlock('blog/adminhtml_article'));
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
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_article_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {


                $model = Mage::getModel('blog/article');
                $model->setData($data)->setId($this->getRequest()->getParam('id'));
                if(!$model->getCreated()){
                    $model->setCreated(now());
                }
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Testimonials was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }


    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('blog/article')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Testimonial was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $testimonials = $this->getRequest()->getParam('article', null);

        if (is_array($testimonials) && sizeof($testimonials) > 0) {
            try {
                foreach ($testimonials as $id) {
                    Mage::getModel('blog/article')->setId($id)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d testimonials have been deleted', sizeof($testimonials)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select testimonials'));
        }
        $this->_redirect('*/*');
    }

}
