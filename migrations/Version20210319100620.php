<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210319100620 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_produit (categorie_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_76264285BCF5E72D (categorie_id), INDEX IDX_76264285F347EFB (produit_id), PRIMARY KEY(categorie_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_produit ADD CONSTRAINT FK_76264285BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_produit ADD CONSTRAINT FK_76264285F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_497DD634BCF5E72D ON categorie (categorie_id)');
        $this->addSql('ALTER TABLE estimation ADD id_produit_id INT DEFAULT NULL, ADD id_commissaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE estimation ADD CONSTRAINT FK_D0527024AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE estimation ADD CONSTRAINT FK_D0527024CA8C2027 FOREIGN KEY (id_commissaire_id) REFERENCES commissaire_priseur (id)');
        $this->addSql('CREATE INDEX IDX_D0527024AABEFE2C ON estimation (id_produit_id)');
        $this->addSql('CREATE INDEX IDX_D0527024CA8C2027 ON estimation (id_commissaire_id)');
        $this->addSql('ALTER TABLE lot ADD id_vente_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B2D1CFB9F FOREIGN KEY (id_vente_id) REFERENCES vente (id)');
        $this->addSql('CREATE INDEX IDX_B81291B2D1CFB9F ON lot (id_vente_id)');
        $this->addSql('ALTER TABLE offre ADD id_produit_id INT DEFAULT NULL, ADD id_acheteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F8EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES acheteur (id)');
        $this->addSql('CREATE INDEX IDX_AF86866FAABEFE2C ON offre (id_produit_id)');
        $this->addSql('CREATE INDEX IDX_AF86866F8EB576A8 ON offre (id_acheteur_id)');
        $this->addSql('ALTER TABLE photo ADD id_produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_14B78418AABEFE2C ON photo (id_produit_id)');
        $this->addSql('ALTER TABLE produit ADD lot_id INT DEFAULT NULL, ADD id_vendeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27A8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2720068689 FOREIGN KEY (id_vendeur_id) REFERENCES vendeur (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27A8CBA5F7 ON produit (lot_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC2720068689 ON produit (id_vendeur_id)');
        $this->addSql('ALTER TABLE utilisateur ADD id_personne_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3BA091CE5 ON utilisateur (id_personne_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorie_produit');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634BCF5E72D');
        $this->addSql('DROP INDEX IDX_497DD634BCF5E72D ON categorie');
        $this->addSql('ALTER TABLE categorie DROP categorie_id');
        $this->addSql('ALTER TABLE estimation DROP FOREIGN KEY FK_D0527024AABEFE2C');
        $this->addSql('ALTER TABLE estimation DROP FOREIGN KEY FK_D0527024CA8C2027');
        $this->addSql('DROP INDEX IDX_D0527024AABEFE2C ON estimation');
        $this->addSql('DROP INDEX IDX_D0527024CA8C2027 ON estimation');
        $this->addSql('ALTER TABLE estimation DROP id_produit_id, DROP id_commissaire_id');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B2D1CFB9F');
        $this->addSql('DROP INDEX IDX_B81291B2D1CFB9F ON lot');
        $this->addSql('ALTER TABLE lot DROP id_vente_id');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FAABEFE2C');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F8EB576A8');
        $this->addSql('DROP INDEX IDX_AF86866FAABEFE2C ON offre');
        $this->addSql('DROP INDEX IDX_AF86866F8EB576A8 ON offre');
        $this->addSql('ALTER TABLE offre DROP id_produit_id, DROP id_acheteur_id');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418AABEFE2C');
        $this->addSql('DROP INDEX IDX_14B78418AABEFE2C ON photo');
        $this->addSql('ALTER TABLE photo DROP id_produit_id');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27A8CBA5F7');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2720068689');
        $this->addSql('DROP INDEX IDX_29A5EC27A8CBA5F7 ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC2720068689 ON produit');
        $this->addSql('ALTER TABLE produit DROP lot_id, DROP id_vendeur_id');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3BA091CE5');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3BA091CE5 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP id_personne_id');
    }
}
