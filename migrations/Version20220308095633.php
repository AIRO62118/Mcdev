<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220308095633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE posseder (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, competence_id INT DEFAULT NULL, niveau VARCHAR(255) NOT NULL, INDEX IDX_62EF7CBAA76ED395 (user_id), INDEX IDX_62EF7CBA15761DAB (competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rechercher (id INT AUTO_INCREMENT NOT NULL, competence_id INT NOT NULL, entreprise_id INT NOT NULL, salaire VARCHAR(255) NOT NULL, niveau_demande VARCHAR(255) NOT NULL, INDEX IDX_F3023C2315761DAB (competence_id), INDEX IDX_F3023C23A4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE rechercher ADD CONSTRAINT FK_F3023C2315761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE rechercher ADD CONSTRAINT FK_F3023C23A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE posseder');
        $this->addSql('DROP TABLE rechercher');
    }
}
