<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220319134036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE statistique_perso (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nb_demande INT NOT NULL, INDEX IDX_185528C6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE statistique_perso ADD CONSTRAINT FK_185528C6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE entreprise ADD adresse_ville_e VARCHAR(255) NOT NULL, ADD adresse_region_e VARCHAR(255) NOT NULL, ADD adresse_cpe VARCHAR(255) NOT NULL, DROP adresse_ville, DROP adresse_region, DROP adresse_cp, CHANGE est_premium est_premium TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE statistique_perso');
        $this->addSql('ALTER TABLE competence CHANGE libelle libelle VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact CHANGE nom nom VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sujet sujet VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE message message LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE domaine CHANGE libelle libelle VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE entreprise ADD adresse_ville VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD adresse_region VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD adresse_cp VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP adresse_ville_e, DROP adresse_region_e, DROP adresse_cpe, CHANGE nom_entreprise nom_entreprise VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE logo_entreprise logo_entreprise VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE banniere_entreprise banniere_entreprise VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_entreprise description_entreprise LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE est_premium est_premium TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE posseder CHANGE niveau niveau VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE profil CHANGE biographie_profil biographie_profil LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE photo_profil photo_profil VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE banniere_profil banniere_profil VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE rechercher CHANGE salaire salaire VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE niveau_demande niveau_demande VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_region adresse_region VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_ville adresse_ville VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_cp adresse_cp VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
