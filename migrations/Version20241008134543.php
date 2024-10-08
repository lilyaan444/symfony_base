<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241008134543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD name VARCHAR(255) NOT NULL, ADD auteur VARCHAR(255) NOT NULL, ADD contenu VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE image ADD name VARCHAR(255) NOT NULL, ADD url VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sauce ADD name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP name, DROP url');
        $this->addSql('ALTER TABLE commentaire DROP name, DROP auteur, DROP contenu');
        $this->addSql('ALTER TABLE sauce DROP name');
    }
}
