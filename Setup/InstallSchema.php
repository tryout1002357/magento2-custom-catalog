<?php
/**
 * @category   Tryout
 * @package    Tryout_CustomCatalog
 * @author     sam.demo@gmail.com
 */

namespace Tryout\CustomCatalog\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('tryout_customcatalog')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('tryout_customcatalog')
			)
			->addColumn(
				'customcatalog_id',
				\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
				null,
				[
					'identity' => true,
					'nullable' => false,
					'primary' => true,
					'unsigned' => true,
				],
				'Customcatalog Id'
			)
			->addColumn(
				'product_id',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				['nullable => false'],
				'Product ID'
			)
			->addColumn(
				'sku',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				[],
				'SKU'
			)
			->addColumn(
				'copy_write_info',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				'64k',
				[],
				'Copy Write Info'
			)
			->addColumn(
				'vpn',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				'64k',
				[],
				'VPN'
			)
			->addColumn(
				'updated_at',
				\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
				null,
				['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
				'Updated At'
			)
			->setComment('Tryout Customcatalog');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('tryout_customcatalog'),
				$setup->getIdxName(
					$installer->getTable('tryout_customcatalog'),
					['product_id', 'sku', 'copy_write_info', 'vpn'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['product_id', 'sku', 'copy_write_info', 'vpn'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}