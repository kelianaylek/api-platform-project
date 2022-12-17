<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221217144044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE public_hollidays (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, date DATETIME NOT NULL, local_name VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, fixed TINYINT(1) NOT NULL, global TINYINT(1) NOT NULL, launch_year INT NOT NULL, UNIQUE INDEX UNIQ_48FC8172F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE public_hollidays ADD CONSTRAINT FK_48FC8172F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE public_hollidays DROP FOREIGN KEY FK_48FC8172F92F3E70');
        $this->addSql('DROP TABLE public_hollidays');
    }
}
