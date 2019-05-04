<?php
/**
 * @category   Tryout
 * @package    Tryout_CustomCatalog
 * @author     sam.demo@gmail.com
 */

namespace Tryout\CustomCatalog\Controller\Adminhtml\Items;

class Delete extends \Tryout\CustomCatalog\Controller\Adminhtml\Items
{

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $model = $this->_objectManager->create('Tryout\CustomCatalog\Model\CustomCatalog');
                $model->load($id);
                $productId = $model->getProductId();

                $product = $this->_objectManager->create('Magento\Catalog\Model\Product')->load($productId);

                $product->setCopywriteinfo(NULL);
                $product->setVpn(NULL);
                $product->save();

                $model->delete();
                $this->messageManager->addSuccess(__('You deleted the item.'));
                $this->_redirect('tryout_customcatalog/*/');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('We can\'t delete item right now. Please review the log and try again.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_redirect('tryout_customcatalog/*/edit', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->messageManager->addError(__('We can\'t find a item to delete.'));
        $this->_redirect('tryout_customcatalog/*/');
    }
}
