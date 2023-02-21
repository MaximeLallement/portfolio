<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221214080917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY fk_id_article_exp');
        $this->addSql('ALTER TABLE article_image DROP FOREIGN KEY fk_id_article');
        $this->addSql('ALTER TABLE article_image DROP FOREIGN KEY fk_id_image_article');
        $this->addSql('ALTER TABLE experience_techno DROP FOREIGN KEY fk_id_experience');
        $this->addSql('ALTER TABLE experience_techno DROP FOREIGN KEY fk_id_techno');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_image');
        $this->addSql('DROP TABLE experience_techno');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE technologie');
        $this->addSql('ALTER TABLE experience ADD id INT AUTO_INCREMENT NOT NULL, ADD lieu VARCHAR(70) NOT NULL, DROP id_experience, DROP lieux, DROP id_article_exp, CHANGE description description LONGTEXT NOT NULL, CHANGE date_debut date_debut DATETIME NOT NULL, CHANGE date_fin date_fin DATETIME NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id_article INT NOT NULL, texte TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(id_article)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE article_image (id_article INT NOT NULL, id_image INT NOT NULL, INDEX fk_id_image_idx (id_image), INDEX IDX_B28A764EDCA7A716 (id_article), PRIMARY KEY(id_article, id_image)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE experience_techno (idExp INT NOT NULL, idTechno INT NOT NULL, INDEX fk_id_techno_idx (idTechno), INDEX IDX_CD3009F127F64F9C (idExp), PRIMARY KEY(idExp, idTechno)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE image (id_image INT NOT NULL, href VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(id_image)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE technologie (id_technologie INT NOT NULL, libelle_technologie VARCHAR(45) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, logo INT NOT NULL, PRIMARY KEY(id_technologie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE article_image ADD CONSTRAINT fk_id_article FOREIGN KEY (id_article) REFERENCES article (id_article) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE article_image ADD CONSTRAINT fk_id_image_article FOREIGN KEY (id_image) REFERENCES image (id_image) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE experience_techno ADD CONSTRAINT fk_id_experience FOREIGN KEY (idExp) REFERENCES experience (id_experience) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE experience_techno ADD CONSTRAINT fk_id_techno FOREIGN KEY (idTechno) REFERENCES technologie (id_technologie) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE experience MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON experience');
        $this->addSql('ALTER TABLE experience ADD id_experience INT NOT NULL, ADD lieux VARCHAR(70) DEFAULT \'Home\' NOT NULL, ADD id_article_exp INT NOT NULL, DROP id, DROP lieu, CHANGE description description TEXT NOT NULL, CHANGE date_debut date_debut DATETIME DEFAULT NULL, CHANGE date_fin date_fin DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT fk_id_article_exp FOREIGN KEY (id_experience) REFERENCES article (id_article) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE experience ADD PRIMARY KEY (id_experience)');
    }
}
