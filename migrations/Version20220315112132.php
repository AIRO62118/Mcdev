<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220315112132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise ADD adresse_ville_e VARCHAR(255) NOT NULL, ADD adresse_region_e VARCHAR(255) NOT NULL, ADD adresse_cpe VARCHAR(255) NOT NULL, DROP adresse_ville, DROP adresse_region, DROP adresse_cp');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise ADD adresse_ville VARCHAR(255) NOT NULL, ADD adresse_region VARCHAR(255) NOT NULL, ADD adresse_cp VARCHAR(255) NOT NULL, DROP adresse_ville_e, DROP adresse_region_e, DROP adresse_cpe');
    }
}
