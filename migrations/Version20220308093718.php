<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220308093718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_entreprise (user_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_AA7E3C8CA76ED395 (user_id), INDEX IDX_AA7E3C8CA4AEAFEA (entreprise_id), PRIMARY KEY(user_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_entreprise ADD CONSTRAINT FK_AA7E3C8CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_entreprise ADD CONSTRAINT FK_AA7E3C8CA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD est_salarie_id INT DEFAULT NULL, ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD date_de_naissance DATE NOT NULL, ADD adresse_region VARCHAR(255) NOT NULL, ADD adresse_ville VARCHAR(255) NOT NULL, ADD adresse_cp VARCHAR(255) NOT NULL, ADD est_premium TINYINT(1) NOT NULL, ADD date_inscription DATETIME NOT NULL, ADD token VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A922E09C FOREIGN KEY (est_salarie_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649A922E09C ON user (est_salarie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_entreprise');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A922E09C');
        $this->addSql('DROP INDEX IDX_8D93D649A922E09C ON user');
        $this->addSql('ALTER TABLE user DROP est_salarie_id, DROP nom, DROP prenom, DROP date_de_naissance, DROP adresse_region, DROP adresse_ville, DROP adresse_cp, DROP est_premium, DROP date_inscription, DROP token');
    }
}
