<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230505142734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advisor ADD address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE advisor ADD CONSTRAINT FK_19ADC9F4F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('CREATE INDEX IDX_19ADC9F4F5B7AF75 ON advisor (address_id)');
        $this->addSql('ALTER TABLE user ADD advisor_id INT DEFAULT NULL, ADD address_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64966D3AD77 FOREIGN KEY (advisor_id) REFERENCES advisor (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64966D3AD77 ON user (advisor_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F5B7AF75 ON user (address_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64966D3AD77');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649F5B7AF75');
        $this->addSql('DROP INDEX IDX_8D93D64966D3AD77 ON `user`');
        $this->addSql('DROP INDEX IDX_8D93D649F5B7AF75 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP advisor_id, DROP address_id');
        $this->addSql('ALTER TABLE advisor DROP FOREIGN KEY FK_19ADC9F4F5B7AF75');
        $this->addSql('DROP INDEX IDX_19ADC9F4F5B7AF75 ON advisor');
        $this->addSql('ALTER TABLE advisor DROP address_id');
    }
}
