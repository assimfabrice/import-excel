<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227000622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE datas ADD commentaire_de_facturation LONGTEXT DEFAULT NULL, ADD type_vnvo VARCHAR(255) DEFAULT NULL, ADD numero_de_dossier_vn VARCHAR(255) NOT NULL, ADD intermediaire_de_vente VARCHAR(255) DEFAULT NULL, ADD date_evenement DATETIME NOT NULL, ADD origine_evenement VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE datas DROP commentaire_de_facturation, DROP type_vnvo, DROP numero_de_dossier_vn, DROP intermediaire_de_vente, DROP date_evenement, DROP origine_evenement');
    }
}
