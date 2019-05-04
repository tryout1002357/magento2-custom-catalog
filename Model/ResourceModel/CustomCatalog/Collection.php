<?php
/**
 * @category   Tryout
 * @package    Tryout_CustomCatalog
 * @author     sam.demo@gmail.com
 */

namespace Tryout\CustomCatalog\Model\ResourceModel\CustomCatalog;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'customcatalog_id';
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Tryout\CustomCatalog\Model\CustomCatalog',
            'Tryout\CustomCatalog\Model\ResourceModel\CustomCatalog'
        );
    }
}