<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210521075803 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acheteur ADD moyen_paiement VARCHAR(255) DEFAULT NULL, ADD identite VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE lot ADD prix_depart DOUBLE PRECISION DEFAULT NULL, ADD isvendu TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD date DATE DEFAULT NULL, ADD heure TIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acheteur DROP moyen_paiement, DROP identite');
        $this->addSql('ALTER TABLE lot DROP prix_depart, DROP isvendu');
        $this->addSql('ALTER TABLE offre DROP date, DROP heure');
    }
}
