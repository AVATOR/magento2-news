<?php
namespace AVATOR\News\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $tableName = 'avator_news';

        // @todo keywords, description
        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable($tableName)
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'News Id'
        )->addColumn(
            'title',
            Table::TYPE_TEXT,
            null,
            [],
            'Title'
        )->addColumn(
            'short_description',
            Table::TYPE_TEXT,
            null,
            [],
            'Short description'
        )->addColumn(
            'description',
            Table::TYPE_TEXT,
            null,
            [],
            'Description'
        )->addColumn(
            'url',
            Table::TYPE_TEXT,
            100,
            ['nullable' => true, 'default' => null],
            'Url'
        )->addColumn(
            'is_active',
            Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => '1'],
            'Is Active?'
        )->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
            'Created At'
        )->addColumn(
            'updated_at',
            Table::TYPE_TIMESTAMP,
            null,
            [],
            'Updated At'
        )->addIndex(
            $installer->getIdxName($tableName, ['id']),
            ['id']
        )->addIndex(
            $installer->getIdxName($tableName, ['url']),
            ['url']
        )->addIndex(
            $installer->getIdxName($tableName, ['created_at']),
            ['created_at']
        )->setComment(
            'AVATOR News'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();

    }
}
