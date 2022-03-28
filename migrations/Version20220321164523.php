<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220321164523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE statistique_perso DROP salaire_moyenne_competence1, DROP salaire_moyenne_competence2, DROP salaire_moyenne_competence3, DROP salaire_moyenne_competence4, DROP salaire_moyenne_competence5');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence CHANGE libelle libelle VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact CHANGE nom nom VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sujet sujet VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE message message LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE domaine CHANGE libelle libelle VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE entreprise CHANGE nom_entreprise nom_entreprise VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE logo_entreprise logo_entreprise VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE banniere_entreprise banniere_entreprise VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_entreprise description_entreprise LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_ville_e adresse_ville_e VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_region_e adresse_region_e VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_cpe adresse_cpe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE posseder CHANGE niveau niveau VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE profil CHANGE biographie_profil biographie_profil LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE photo_profil photo_profil VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE banniere_profil banniere_profil VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE rechercher CHANGE salaire salaire VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE niveau_demande niveau_demande VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE statistique_perso ADD salaire_moyenne_competence1 INT DEFAULT NULL, ADD salaire_moyenne_competence2 INT DEFAULT NULL, ADD salaire_moyenne_competence3 INT DEFAULT NULL, ADD salaire_moyenne_competence4 INT DEFAULT NULL, ADD salaire_moyenne_competence5 INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_region adresse_region VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_ville adresse_ville VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_cp adresse_cp VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
