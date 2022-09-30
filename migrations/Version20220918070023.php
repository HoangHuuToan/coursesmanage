<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220918070023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, imgpath VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_lesson (course_id INT NOT NULL, lesson_id INT NOT NULL, INDEX IDX_564CB5BE591CC992 (course_id), INDEX IDX_564CB5BECDF80196 (lesson_id), PRIMARY KEY(course_id, lesson_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, linklesson VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course_lesson ADD CONSTRAINT FK_564CB5BE591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_lesson ADD CONSTRAINT FK_564CB5BECDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course_lesson DROP FOREIGN KEY FK_564CB5BE591CC992');
        $this->addSql('ALTER TABLE course_lesson DROP FOREIGN KEY FK_564CB5BECDF80196');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_lesson');
        $this->addSql('DROP TABLE lesson');
    }
}
