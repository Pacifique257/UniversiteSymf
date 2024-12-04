<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240918132831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, appartenir_id INT DEFAULT NULL, niveau VARCHAR(70) NOT NULL, INDEX IDX_8F87BF96E977E148 (appartenir_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_etudiant (classe_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_4BB0EA4D8F5EA509 (classe_id), INDEX IDX_4BB0EA4DDDEAB1A3 (etudiant_id), PRIMARY KEY(classe_id, etudiant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, dep_id INT DEFAULT NULL, nomd VARCHAR(70) NOT NULL, coded VARCHAR(10) NOT NULL, INDEX IDX_C1765B63814AA86C (dep_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, matricule VARCHAR(15) NOT NULL, nom VARCHAR(70) NOT NULL, prenom VARCHAR(70) NOT NULL, ddn DATE NOT NULL, genre VARCHAR(10) NOT NULL, noteexetat DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faculte (id INT AUTO_INCREMENT NOT NULL, nomf VARCHAR(70) NOT NULL, coded VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT DEFAULT NULL, class_id INT DEFAULT NULL, anne_a VARCHAR(255) NOT NULL, INDEX IDX_5E90F6D6DDEAB1A3 (etudiant_id), INDEX IDX_5E90F6D6EA000B10 (class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96E977E148 FOREIGN KEY (appartenir_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE classe_etudiant ADD CONSTRAINT FK_4BB0EA4D8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_etudiant ADD CONSTRAINT FK_4BB0EA4DDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B63814AA86C FOREIGN KEY (dep_id) REFERENCES faculte (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6EA000B10 FOREIGN KEY (class_id) REFERENCES classe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96E977E148');
        $this->addSql('ALTER TABLE classe_etudiant DROP FOREIGN KEY FK_4BB0EA4D8F5EA509');
        $this->addSql('ALTER TABLE classe_etudiant DROP FOREIGN KEY FK_4BB0EA4DDDEAB1A3');
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B63814AA86C');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6DDEAB1A3');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6EA000B10');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE classe_etudiant');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE faculte');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
