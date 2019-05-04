<?php
/**
 * @category   Tryout
 * @package    Tryout_CustomCatalog
 * @author     sam.demo@gmail.com
 */

namespace Tryout\CustomCatalog\Model\ResourceModel;

class CustomCatalog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('tryout_customcatalog', 'customcatalog_id');   //here "tryout_customcatalog" is table name and "customcatalog_id" is the primary key of custom table
    }
}