<?php

namespace Tryout\CustomCatalog\Observer;

use Magento\Framework\Event\ObserverInterface;

class ProductDeleteafter implements ObserverInterface
{    
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $_product = $observer->getProduct();
        $_sku     = $_product->getSku(); 
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$model = $objectManager->create('Tryout\CustomCatalog\Model\CustomCatalog')->getCollection()->addFieldToFilter('product_id',$_product->getId());
        
        foreach ($model as $value) {
            $id = $value->getId();
        }
        if (count($model) > 0 && $id > 0) {
            $modelNP = $objectManager->create('Tryout\CustomCatalog\Model\CustomCatalog');
            $modelNP->load($id);
            $modelNP->delete();
        }
    }   
}