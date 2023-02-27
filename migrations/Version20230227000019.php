<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227000019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE datas (id INT AUTO_INCREMENT NOT NULL, compte_affaire VARCHAR(255) NOT NULL, compte_evenement VARCHAR(255) NOT NULL, numero_de_fiche INT NOT NULL, libelle_civilite VARCHAR(255) DEFAULT NULL, propriete_actuel_du_vehicule VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, numero_et_nom_de_la_voie VARCHAR(255) NOT NULL, complement_adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, telephone_domicile INT NOT NULL, telephone_portable INT DEFAULT NULL, telephone_job INT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, date_de_mise_en_circulation DATETIME NOT NULL, date_achat DATETIME NOT NULL, date_dernier_evenement DATETIME NOT NULL, libelle_marque VARCHAR(255) NOT NULL, libelle_modele VARCHAR(255) DEFAULT NULL, version VARCHAR(255) DEFAULT NULL, vin VARCHAR(255) NOT NULL, immatriculation VARCHAR(255) NOT NULL, type_de_prospect VARCHAR(255) NOT NULL, kilometrage INT NOT NULL, libelle_eneergie VARCHAR(255) NOT NULL, vendeur VARCHAR(255) DEFAULT NULL, vendeur_vo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE datas');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
