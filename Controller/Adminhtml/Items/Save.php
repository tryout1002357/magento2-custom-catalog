<?php
/**
 * @category   Tryout
 * @package    Tryout_CustomCatalog
 * @author     sam.demo@gmail.com
 */

namespace Tryout\CustomCatalog\Controller\Adminhtml\Items;

class Save extends \Tryout\CustomCatalog\Controller\Adminhtml\Items
{
    public function execute()
    {
        if ($this->getRequest()->getPostValue()) {
            try {
                $model = $this->_objectManager->create('Tryout\CustomCatalog\Model\CustomCatalog');
                $data = $this->getRequest()->getPostValue();
                $id = $this->getRequest()->getParam('id');
                if ($id) {
                    $model->load($id);
                    if ($id != $model->getId()) {
                        throw new \Magento\Framework\Exception\LocalizedException(__('The wrong item is specified.'));
                    }
                }

                $product = $this->_objectManager->create('Magento\Catalog\Model\Product')->load($data['product_id']);
                $product->setCopywriteinfo($data['copy_write_info']);
                $product->setVpn($data['vpn']);
                $product->save();  

                $model->setData($data);
                $session = $this->_objectManager->get('Magento\Backend\Model\Session');
                $session->setPageData($model->getData());
                $model->save();
                $this->messageManager->addSuccess(__('You saved the item.'));
                $session->setPageData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('tryout_customcatalog/*/edit', ['id' => $model->getId()]);
                    return;
                }
                $this->_redirect('tryout_customcatalog/*/');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
                $id = (int)$this->getRequest()->getParam('id');
                if (!empty($id)) {
                    $this->_redirect('tryout_customcatalog/*/edit', ['id' => $id]);
                } else {
                    $this->_redirect('tryout_customcatalog/*/new');
                }
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('Something went wrong while saving the item data. Please review the error log.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData($data);
                $this->_redirect('tryout_customcatalog/*/edit', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->_redirect('tryout_customcatalog/*/');
    }
}
