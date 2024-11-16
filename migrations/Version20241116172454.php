<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241116172454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE project (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, customer VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE project_coder (project_id INT NOT NULL, coder_id INT NOT NULL, PRIMARY KEY(project_id, coder_id))');
        $this->addSql('CREATE INDEX IDX_81FFF845166D1F9C ON project_coder (project_id)');
        $this->addSql('CREATE INDEX IDX_81FFF845DC398579 ON project_coder (coder_id)');
        $this->addSql('ALTER TABLE project_coder ADD CONSTRAINT FK_81FFF845166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE project_coder ADD CONSTRAINT FK_81FFF845DC398579 FOREIGN KEY (coder_id) REFERENCES coder (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE project_coder DROP CONSTRAINT FK_81FFF845166D1F9C');
        $this->addSql('ALTER TABLE project_coder DROP CONSTRAINT FK_81FFF845DC398579');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_coder');
    }
}
