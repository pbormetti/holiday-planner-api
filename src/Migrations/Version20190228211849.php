<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190228211849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return "Initial database schema";
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql("CREATE TABLE holiday_request (id INT AUTO_INCREMENT NOT NULL, employee_id INT NOT NULL, business_unit_id INT NOT NULL, responsible1_id INT NOT NULL, responsible2_id INT NOT NULL, start DATE NOT NULL, end DATE NOT NULL, note VARCHAR(35) DEFAULT NULL, approved_by1 TINYINT(1) NOT NULL, approved_by2 TINYINT(1) NOT NULL, INDEX IDX_94ACA918C03F15C (employee_id), INDEX IDX_94ACA91A58ECB40 (business_unit_id), INDEX IDX_94ACA91BBD1E3AB (responsible1_id), INDEX IDX_94ACA91A9644C45 (responsible2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE business_unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE responsible (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE holiday_request ADD CONSTRAINT FK_94ACA918C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)");
        $this->addSql("ALTER TABLE holiday_request ADD CONSTRAINT FK_94ACA91A58ECB40 FOREIGN KEY (business_unit_id) REFERENCES business_unit (id)");
        $this->addSql("ALTER TABLE holiday_request ADD CONSTRAINT FK_94ACA91BBD1E3AB FOREIGN KEY (responsible1_id) REFERENCES responsible (id)");
        $this->addSql("ALTER TABLE holiday_request ADD CONSTRAINT FK_94ACA91A9644C45 FOREIGN KEY (responsible2_id) REFERENCES responsible (id)");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql("ALTER TABLE holiday_request DROP FOREIGN KEY FK_94ACA918C03F15C");
        $this->addSql("ALTER TABLE holiday_request DROP FOREIGN KEY FK_94ACA91A58ECB40");
        $this->addSql("ALTER TABLE holiday_request DROP FOREIGN KEY FK_94ACA91BBD1E3AB");
        $this->addSql("ALTER TABLE holiday_request DROP FOREIGN KEY FK_94ACA91A9644C45");
        $this->addSql("DROP TABLE holiday_request");
        $this->addSql("DROP TABLE employee");
        $this->addSql("DROP TABLE business_unit");
        $this->addSql("DROP TABLE responsible");
    }
}
