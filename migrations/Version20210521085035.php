<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210521085035 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acheteur ADD id_utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE acheteur ADD CONSTRAINT FK_304AFF9DC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_304AFF9DC6EE5C49 ON acheteur (id_utilisateur_id)');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FAABEFE2C');
        $this->addSql('DROP INDEX IDX_AF86866FAABEFE2C ON offre');
        $this->addSql('ALTER TABLE offre CHANGE id_produit_id id_lot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F8EFC101A FOREIGN KEY (id_lot_id) REFERENCES lot (id)');
        $this->addSql('CREATE INDEX IDX_AF86866F8EFC101A ON offre (id_lot_id)');
        $this->addSql('ALTER TABLE vente ADD id_lieu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CB42FBABC FOREIGN KEY (id_lieu_id) REFERENCES lieu (id)');
        $this->addSql('CREATE INDEX IDX_888A2A4CB42FBABC ON vente (id_lieu_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acheteur DROP FOREIGN KEY FK_304AFF9DC6EE5C49');
        $this->addSql('DROP INDEX UNIQ_304AFF9DC6EE5C49 ON acheteur');
        $this->addSql('ALTER TABLE acheteur DROP id_utilisateur_id');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F8EFC101A');
        $this->addSql('DROP INDEX IDX_AF86866F8EFC101A ON offre');
        $this->addSql('ALTER TABLE offre CHANGE id_lot_id id_produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_AF86866FAABEFE2C ON offre (id_produit_id)');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4CB42FBABC');
        $this->addSql('DROP INDEX IDX_888A2A4CB42FBABC ON vente');
        $this->addSql('ALTER TABLE vente DROP id_lieu_id');
    }
}
