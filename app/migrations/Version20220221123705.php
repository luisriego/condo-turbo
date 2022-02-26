<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220221123705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE condo (id CHAR(36) NOT NULL, cnpj VARCHAR(14) NOT NULL, fantasy_name VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_condo (user_id CHAR(36) NOT NULL, condo_id CHAR(36) NOT NULL, INDEX IDX_7E2D2CDA76ED395 (user_id), INDEX IDX_7E2D2CDE2B100ED (condo_id), PRIMARY KEY(user_id, condo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_condo ADD CONSTRAINT FK_7E2D2CDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_condo ADD CONSTRAINT FK_7E2D2CDE2B100ED FOREIGN KEY (condo_id) REFERENCES condo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(100) NOT NULL, CHANGE id id CHAR(36) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_condo DROP FOREIGN KEY FK_7E2D2CDE2B100ED');
        $this->addSql('DROP TABLE condo');
        $this->addSql('DROP TABLE user_condo');
        $this->addSql('ALTER TABLE user DROP name, CHANGE id id CHAR(36) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
