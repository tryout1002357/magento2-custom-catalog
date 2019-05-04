<?php
/**
 * @category   Tryout
 * @package    Tryout_CustomCatalog
 * @author     sam.demo@gmail.com
 */

namespace Tryout\CustomCatalog\Controller\Adminhtml\Items;

class Index extends \Tryout\CustomCatalog\Controller\Adminhtml\Items
{
    /**
     * Items list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Tryout_CustomCatalog::test');
        $resultPage->getConfig()->getTitle()->prepend(__('Custom Catalog'));
        $resultPage->addBreadcrumb(__('Custom'), __('Custom'));
        $resultPage->addBreadcrumb(__('Custom'), __('Custom'));
        return $resultPage;
    }
}