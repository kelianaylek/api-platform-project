<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221217150227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE public_holidays CHANGE local_name local_name VARCHAR(255) DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE fixed fixed TINYINT(1) DEFAULT NULL, CHANGE global global TINYINT(1) DEFAULT NULL, CHANGE launch_year launch_year INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE public_holidays CHANGE local_name local_name VARCHAR(255) NOT NULL, CHANGE name name VARCHAR(255) NOT NULL, CHANGE fixed fixed TINYINT(1) NOT NULL, CHANGE global global TINYINT(1) NOT NULL, CHANGE launch_year launch_year INT NOT NULL');
    }
}
