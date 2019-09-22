<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20190620175527 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('
            CREATE TABLE spots (
              id UUID NOT NULL PRIMARY KEY,
              name VARCHAR(255) NOT NULL,
              description VARCHAR(1000),
              localization_street VARCHAR(255) NOT NULL,
              localization_city VARCHAR(255) NOT NULL,
              localization_postal_code VARCHAR(255) NOT NULL,
              localization_latitude DECIMAL(14, 12) NOT NULL,
              localization_longitude DECIMAL(15, 12) NOT NULL
            )
        ');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        throw new \RuntimeException();

        $schema->dropTable('spots');
    }
}
