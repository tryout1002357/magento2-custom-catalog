<?php
/**
 * @category   Tryout
 * @package    Tryout_CustomCatalog
 * @author     sam.demo@gmail.com
 */

namespace Tryout\CustomCatalog\Model;

use Magento\Framework\Model\AbstractModel;

class CustomCatalog extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Tryout\CustomCatalog\Model\ResourceModel\CustomCatalog');
    }
}