<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200527144934 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE hometasks (id INT AUTO_INCREMENT NOT NULL, lesson_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, createdAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updatedAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, INDEX IDX_2C5BA443CDF80196 (lesson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `groups` (id INT AUTO_INCREMENT NOT NULL, course_id INT DEFAULT NULL, startDate DATETIME NOT NULL, createdAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updatedAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, INDEX IDX_F06D3970591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groups_students (group_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_1F7B776DFE54D947 (group_id), INDEX IDX_1F7B776DCB944F1A (student_id), PRIMARY KEY(group_id, student_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lessons (id INT AUTO_INCREMENT NOT NULL, group_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, createdAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updatedAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, INDEX IDX_3F4218D9FE54D947 (group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE students (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, birthday DATE NOT NULL, createdAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updatedAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE homeworks (id INT AUTO_INCREMENT NOT NULL, hometask_id INT DEFAULT NULL, student_id INT DEFAULT NULL, mark VARCHAR(255) NOT NULL, answerLink VARCHAR(255) NOT NULL, createdAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updatedAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, INDEX IDX_8AE6C39784818FB8 (hometask_id), INDEX IDX_8AE6C397CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE courses (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, lessonsCount INT NOT NULL, createdAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, updatedAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hometasks ADD CONSTRAINT FK_2C5BA443CDF80196 FOREIGN KEY (lesson_id) REFERENCES lessons (id)');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D3970591CC992 FOREIGN KEY (course_id) REFERENCES courses (id)');
        $this->addSql('ALTER TABLE groups_students ADD CONSTRAINT FK_1F7B776DFE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groups_students ADD CONSTRAINT FK_1F7B776DCB944F1A FOREIGN KEY (student_id) REFERENCES students (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lessons ADD CONSTRAINT FK_3F4218D9FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id)');
        $this->addSql('ALTER TABLE homeworks ADD CONSTRAINT FK_8AE6C39784818FB8 FOREIGN KEY (hometask_id) REFERENCES hometasks (id)');
        $this->addSql('ALTER TABLE homeworks ADD CONSTRAINT FK_8AE6C397CB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE homeworks DROP FOREIGN KEY FK_8AE6C39784818FB8');
        $this->addSql('ALTER TABLE groups_students DROP FOREIGN KEY FK_1F7B776DFE54D947');
        $this->addSql('ALTER TABLE lessons DROP FOREIGN KEY FK_3F4218D9FE54D947');
        $this->addSql('ALTER TABLE hometasks DROP FOREIGN KEY FK_2C5BA443CDF80196');
        $this->addSql('ALTER TABLE groups_students DROP FOREIGN KEY FK_1F7B776DCB944F1A');
        $this->addSql('ALTER TABLE homeworks DROP FOREIGN KEY FK_8AE6C397CB944F1A');
        $this->addSql('ALTER TABLE groups DROP FOREIGN KEY FK_F06D3970591CC992');
        $this->addSql('DROP TABLE hometasks');
        $this->addSql('DROP TABLE groups');
        $this->addSql('DROP TABLE groups_students');
        $this->addSql('DROP TABLE lessons');
        $this->addSql('DROP TABLE students');
        $this->addSql('DROP TABLE homeworks');
        $this->addSql('DROP TABLE courses');
    }
}
