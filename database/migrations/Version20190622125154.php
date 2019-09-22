<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20190622125154 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->getTable('spots');
        $table->addColumn('is_open_round_the_clock', 'boolean', ['default' => false]);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        throw new \RuntimeException();

        $table = $schema->getTable('spots');
        $table->dropColumn('is_open_round_the_clock');
    }
}
