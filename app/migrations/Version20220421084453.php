<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220421084453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create `entry` table with his relationships';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE entry (id CHAR(36) NOT NULL, user_id CHAR(36) NOT NULL, condo_id CHAR(36) NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, value_cents INT NOT NULL, due DATETIME DEFAULT NULL, state SMALLINT NOT NULL, created_on DATETIME NOT NULL, INDEX IDX_2B219D70A76ED395 (user_id), INDEX IDX_2B219D70E2B100ED (condo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entry ADD CONSTRAINT FK_2B219D70A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE entry ADD CONSTRAINT FK_2B219D70E2B100ED FOREIGN KEY (condo_id) REFERENCES condo (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE entry');
    }
}
