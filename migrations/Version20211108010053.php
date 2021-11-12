<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211108010053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE publicite (id INT AUTO_INCREMENT NOT NULL, admin_id INT DEFAULT NULL, remorquage_id INT DEFAULT NULL, mecancien_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_1D394E39642B8210 (admin_id), INDEX IDX_1D394E39A33CF9F7 (remorquage_id), INDEX IDX_1D394E39DE8C652B (mecancien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE publicite ADD CONSTRAINT FK_1D394E39642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE publicite ADD CONSTRAINT FK_1D394E39A33CF9F7 FOREIGN KEY (remorquage_id) REFERENCES remorquage (id)');
        $this->addSql('ALTER TABLE publicite ADD CONSTRAINT FK_1D394E39DE8C652B FOREIGN KEY (mecancien_id) REFERENCES mecancien (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE publicite');
    }
}
