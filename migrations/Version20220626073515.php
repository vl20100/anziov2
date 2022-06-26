<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220626073515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza ADD base_id INT NOT NULL');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826F6967DF41 FOREIGN KEY (base_id) REFERENCES pizza_base (id)');
        $this->addSql('CREATE INDEX IDX_CFDD826F6967DF41 ON pizza (base_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_CFDD826F6967DF41');
        $this->addSql('DROP INDEX IDX_CFDD826F6967DF41 ON pizza');
        $this->addSql('ALTER TABLE pizza DROP base_id');
    }
}
