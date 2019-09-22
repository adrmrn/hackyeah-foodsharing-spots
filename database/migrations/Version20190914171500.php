<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20190914171500 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('
            CREATE TABLE food_pickups (
              id UUID NOT NULL PRIMARY KEY,
              contact_details_name VARCHAR(255) NOT NULL,
              contact_details_email VARCHAR(255) NOT NULL,
              contact_details_phone VARCHAR(10) NOT NULL,
              status VARCHAR(20) NOT NULL
            )
        ');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {

    }
}
