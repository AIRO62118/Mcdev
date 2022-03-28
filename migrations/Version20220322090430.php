<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220322090430 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE interesser (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, entreprise_id INT NOT NULL, date_mis_en_favori DATETIME NOT NULL, INDEX IDX_35C9E3ACA76ED395 (user_id), INDEX IDX_35C9E3ACA4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistique_perso (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nb_demande INT NOT NULL, INDEX IDX_185528C6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE interesser ADD CONSTRAINT FK_35C9E3ACA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE interesser ADD CONSTRAINT FK_35C9E3ACA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE statistique_perso ADD CONSTRAINT FK_185528C6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rechercher ADD date_demande DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE interesser');
        $this->addSql('DROP TABLE statistique_perso');
        $this->addSql('ALTER TABLE rechercher DROP date_demande');
    }
}
