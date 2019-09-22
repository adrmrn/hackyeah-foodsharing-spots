<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20190621200059 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('equipments');
        $table->addColumn('id', 'uuid');
        $table->addColumn('spot_id', 'uuid');
        $table->addColumn('type', 'string', ['length' => 20]);
        $table->addUniqueIndex(['id']);
        $table->setPrimaryKey(['id']);
        $table->addForeignKeyConstraint(
            'spots',
            ['spot_id'],
            ['id'],
            ['onDelete' => 'CASCADE']
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        throw new \RuntimeException();

        $schema->dropTable('equipments');
    }
}
