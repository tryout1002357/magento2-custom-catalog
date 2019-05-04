<?php
namespace Tryout\CustomCatalog\Model;
use Tryout\CustomCatalog\Api\VpnInterface;
 
class Vpn implements VpnInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name Product name.
     * @return string Greeting message with product name.
     */
    public function vpn($vpn) {

        $data = $this->productData($vpn);
        echo "<pre>===";
        print_r($data->getData());
        exit;
    }


    public function productData($vpn)
    {
       $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
       $product = $objectManager->create('Magento\Catalog\Model\Product')->getCollection()->addFieldToFilter('vpn',$vpn);
        return $product;
    }

}