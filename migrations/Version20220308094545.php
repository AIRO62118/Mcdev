<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220308094545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence ADD parent_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687FB3750AF4 FOREIGN KEY (parent_id_id) REFERENCES competence (id)');
        $this->addSql('CREATE INDEX IDX_94D4687FB3750AF4 ON competence (parent_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY FK_94D4687FB3750AF4');
        $this->addSql('DROP INDEX IDX_94D4687FB3750AF4 ON competence');
        $this->addSql('ALTER TABLE competence DROP parent_id_id');
    }
}
