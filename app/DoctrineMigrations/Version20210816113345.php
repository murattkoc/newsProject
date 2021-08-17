<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20210816113345 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE news_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE news (id INT NOT NULL, title VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, content VARCHAR(255) NOT NULL, author_id INT NOT NULL, editor_id INT DEFAULT NULL, receive_id VARCHAR(255) DEFAULT NULL, public_status VARCHAR(255) NOT NULL, news_status VARCHAR(255) DEFAULT NULL, news_rating VARCHAR(255) DEFAULT NULL, added_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, public_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE fos_user ADD user_rating VARCHAR(255) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE news_id_seq CASCADE');
        $this->addSql('DROP TABLE news');
        $this->addSql('ALTER TABLE fos_user DROP user_rating');
    }
}
