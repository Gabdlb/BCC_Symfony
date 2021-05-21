<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210521154800 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commissaire_priseur ADD id_personne_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commissaire_priseur ADD CONSTRAINT FK_E21F5C61BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E21F5C61BA091CE5 ON commissaire_priseur (id_personne_id)');
        $this->addSql('ALTER TABLE vendeur ADD id_utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vendeur ADD CONSTRAINT FK_7AF49996C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7AF49996C6EE5C49 ON vendeur (id_utilisateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commissaire_priseur DROP FOREIGN KEY FK_E21F5C61BA091CE5');
        $this->addSql('DROP INDEX UNIQ_E21F5C61BA091CE5 ON commissaire_priseur');
        $this->addSql('ALTER TABLE commissaire_priseur DROP id_personne_id');
        $this->addSql('ALTER TABLE vendeur DROP FOREIGN KEY FK_7AF49996C6EE5C49');
        $this->addSql('DROP INDEX UNIQ_7AF49996C6EE5C49 ON vendeur');
        $this->addSql('ALTER TABLE vendeur DROP id_utilisateur_id');
    }
}
