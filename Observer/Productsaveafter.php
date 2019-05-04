<?php

namespace Tryout\CustomCatalog\Observer;

use Magento\Framework\Event\ObserverInterface;

class Productsaveafter implements ObserverInterface
{    
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $_product = $observer->getProduct();
        $_sku     = $_product->getSku(); 
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $modelNP = $objectManager->create('Tryout\CustomCatalog\Model\CustomCatalog')->getCollection()->addFieldToFilter('product_id',$_product->getId());
        
        foreach ($modelNP as $value) {
            $id = $value->getId();
        }
        $model = $objectManager->create('Tryout\CustomCatalog\Model\CustomCatalog');
        if (count($modelNP) == 0) {
        	
			$model->setProductId($_product->getId())
			       ->setSku($_sku)
			       ->setCopyWriteInfo($_product->getCopywriteinfo())
			       ->setVpn($_product->getVpn());
			$model->save();

        }else{
        	$model->load($id);
        	$model->setProductId($_product->getId())
		       ->setSku($_sku)
		       ->setCopyWriteInfo($_product->getCopywriteinfo())
		       ->setVpn($_product->getVpn());
			$model->save();
        }

    }   
}