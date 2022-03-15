<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220315074757 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, parent_id_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_94D4687FB3750AF4 (parent_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, sujet VARCHAR(255) NOT NULL, email VARCHAR(100) NOT NULL, message LONGTEXT NOT NULL, date_envoi DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domaine (id INT AUTO_INCREMENT NOT NULL, competence_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_78AF0ACC15761DAB (competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, logo_entreprise VARCHAR(255) DEFAULT NULL, banniere_entreprise VARCHAR(255) DEFAULT NULL, description_entreprise LONGTEXT DEFAULT NULL, adresse_ville VARCHAR(255) NOT NULL, adresse_region VARCHAR(255) NOT NULL, adresse_cp VARCHAR(255) NOT NULL, est_premium TINYINT(1) NOT NULL, date_création_page DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posseder (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, competence_id INT DEFAULT NULL, niveau VARCHAR(255) NOT NULL, INDEX IDX_62EF7CBAA76ED395 (user_id), INDEX IDX_62EF7CBA15761DAB (competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, biographie_profil LONGTEXT DEFAULT NULL, photo_profil VARCHAR(255) DEFAULT NULL, banniere_profil VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_E6D6B297A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rechercher (id INT AUTO_INCREMENT NOT NULL, competence_id INT NOT NULL, entreprise_id INT NOT NULL, salaire VARCHAR(255) NOT NULL, niveau_demande VARCHAR(255) NOT NULL, INDEX IDX_F3023C2315761DAB (competence_id), INDEX IDX_F3023C23A4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, est_salarie_id INT DEFAULT NULL, est_patron_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, adresse_region VARCHAR(255) NOT NULL, adresse_ville VARCHAR(255) NOT NULL, adresse_cp VARCHAR(255) NOT NULL, est_premium TINYINT(1) DEFAULT NULL, date_inscription DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649A922E09C (est_salarie_id), UNIQUE INDEX UNIQ_8D93D649A22CC7F3 (est_patron_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687FB3750AF4 FOREIGN KEY (parent_id_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE domaine ADD CONSTRAINT FK_78AF0ACC15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rechercher ADD CONSTRAINT FK_F3023C2315761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE rechercher ADD CONSTRAINT FK_F3023C23A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A922E09C FOREIGN KEY (est_salarie_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A22CC7F3 FOREIGN KEY (est_patron_id) REFERENCES entreprise (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY FK_94D4687FB3750AF4');
        $this->addSql('ALTER TABLE domaine DROP FOREIGN KEY FK_78AF0ACC15761DAB');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBA15761DAB');
        $this->addSql('ALTER TABLE rechercher DROP FOREIGN KEY FK_F3023C2315761DAB');
        $this->addSql('ALTER TABLE rechercher DROP FOREIGN KEY FK_F3023C23A4AEAFEA');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A922E09C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A22CC7F3');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBAA76ED395');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297A76ED395');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE posseder');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE rechercher');
        $this->addSql('DROP TABLE user');
    }
}
