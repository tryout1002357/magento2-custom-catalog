<?php
/**
 * @category   Tryout
 * @package    Tryout_CustomCatalog
 * @author     sam.demo@gmail.com
 */

namespace Tryout\CustomCatalog\Controller\Adminhtml\Items;

class NewAction extends \Tryout\CustomCatalog\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
