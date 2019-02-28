<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190228211917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO employee (name) VALUES ('Mike Ross'), ('Rachel Zane'), ('Donna Paulsen')");
        $this->addSql("INSERT INTO business_unit (name, description) VALUES ('Rep.1', 'Reparto 1'), ('Rep.2', 'Reparto 2'), ('Rep.3', 'Reparto 3')");
        $this->addSql("INSERT INTO responsible (name) VALUES ('Jessica Pearson'), ('Harvey Specter'), ('Louis Litt')");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM holiday_request");
        $this->addSql("DELETE FROM employee");
        $this->addSql("DELETE FROM business_unit");
        $this->addSql("DELETE FROM responsible");
    }
}
