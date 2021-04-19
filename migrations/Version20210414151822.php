<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210414151822 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rumibook ADD club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rumibook ADD CONSTRAINT FK_FFEEC39D61190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_FFEEC39D61190A32 ON rumibook (club_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rumibook DROP FOREIGN KEY FK_FFEEC39D61190A32');
        $this->addSql('DROP INDEX IDX_FFEEC39D61190A32 ON rumibook');
        $this->addSql('ALTER TABLE rumibook DROP club_id');
    }
}
