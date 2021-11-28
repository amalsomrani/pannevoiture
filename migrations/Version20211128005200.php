<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211128005200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mecancien ADD zoneintervention VARCHAR(255) NOT NULL, ADD joursdetravail VARCHAR(255) NOT NULL, ADD profession VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE remorquage CHANGE zoneintervention zoneintervention VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE service CHANGE nom nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE image image VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mecancien DROP zoneintervention, DROP joursdetravail, DROP profession');
        $this->addSql('ALTER TABLE remorquage CHANGE zoneintervention zoneintervention VARCHAR(1000) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE service CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE nom nom VARCHAR(1000) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
