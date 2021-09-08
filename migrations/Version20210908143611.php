<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210908143611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation ADD recette_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D83B016C1 FOREIGN KEY (recette_id_id) REFERENCES recette (id)');
        $this->addSql('CREATE INDEX IDX_1981A66D83B016C1 ON operation (recette_id_id)');
        $this->addSql('ALTER TABLE recette_ingredient ADD ingredient_id_id INT DEFAULT NULL, ADD recette_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recette_ingredient ADD CONSTRAINT FK_17C041A96676F996 FOREIGN KEY (ingredient_id_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE recette_ingredient ADD CONSTRAINT FK_17C041A983B016C1 FOREIGN KEY (recette_id_id) REFERENCES recette (id)');
        $this->addSql('CREATE INDEX IDX_17C041A96676F996 ON recette_ingredient (ingredient_id_id)');
        $this->addSql('CREATE INDEX IDX_17C041A983B016C1 ON recette_ingredient (recette_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D83B016C1');
        $this->addSql('DROP INDEX IDX_1981A66D83B016C1 ON operation');
        $this->addSql('ALTER TABLE operation DROP recette_id_id');
        $this->addSql('ALTER TABLE recette_ingredient DROP FOREIGN KEY FK_17C041A96676F996');
        $this->addSql('ALTER TABLE recette_ingredient DROP FOREIGN KEY FK_17C041A983B016C1');
        $this->addSql('DROP INDEX IDX_17C041A96676F996 ON recette_ingredient');
        $this->addSql('DROP INDEX IDX_17C041A983B016C1 ON recette_ingredient');
        $this->addSql('ALTER TABLE recette_ingredient DROP ingredient_id_id, DROP recette_id_id');
    }
}
