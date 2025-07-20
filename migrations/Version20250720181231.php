<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250720181231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateurs (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', nom_utilisateur VARCHAR(150) NOT NULL, prenom_utilisateur VARCHAR(200) NOT NULL, adresse_utilisateur VARCHAR(100) NOT NULL, email_utilisateur VARCHAR(255) NOT NULL, fonction_utilisateur VARCHAR(50) NOT NULL, situation_matri_utils VARCHAR(50) NOT NULL, sexe_utilisateur VARCHAR(10) NOT NULL, date_nass_utils DATE NOT NULL, lieu_nais_utils VARCHAR(150) NOT NULL, age_utilisateur INT NOT NULL, cin_utilisateur VARCHAR(20) NOT NULL, date_delivre_cin_utils DATE NOT NULL, lieu_delivre_cin_utils VARCHAR(100) NOT NULL, types VARCHAR(50) NOT NULL, image_name_utilisateur VARCHAR(255) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
