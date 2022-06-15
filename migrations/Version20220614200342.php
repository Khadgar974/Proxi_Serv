<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220614200342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boutique (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(150) NOT NULL, description LONGTEXT DEFAULT NULL, siret VARCHAR(150) NOT NULL, adresse VARCHAR(150) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(150) NOT NULL, tel VARCHAR(150) DEFAULT NULL, image VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, is_siret_verified TINYINT(1) NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modified_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_A1223C5426E94372 (siret), UNIQUE INDEX UNIQ_A1223C54A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boutique_categorie (boutique_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_2694DF2CAB677BE6 (boutique_id), INDEX IDX_2694DF2CBCF5E72D (categorie_id), PRIMARY KEY(boutique_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(150) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, boutique_id INT NOT NULL, title VARCHAR(150) NOT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) NOT NULL, prix INT NOT NULL, quantite INT NOT NULL, reference VARCHAR(40) DEFAULT NULL, bon_plan TINYINT(1) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modified_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_BE2DDF8CAB677BE6 (boutique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(150) NOT NULL, type_user VARCHAR(255) NOT NULL, token VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modified_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boutique ADD CONSTRAINT FK_A1223C54A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE boutique_categorie ADD CONSTRAINT FK_2694DF2CAB677BE6 FOREIGN KEY (boutique_id) REFERENCES boutique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE boutique_categorie ADD CONSTRAINT FK_2694DF2CBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CAB677BE6 FOREIGN KEY (boutique_id) REFERENCES boutique (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE boutique_categorie DROP FOREIGN KEY FK_2694DF2CAB677BE6');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CAB677BE6');
        $this->addSql('ALTER TABLE boutique_categorie DROP FOREIGN KEY FK_2694DF2CBCF5E72D');
        $this->addSql('ALTER TABLE boutique DROP FOREIGN KEY FK_A1223C54A76ED395');
        $this->addSql('DROP TABLE boutique');
        $this->addSql('DROP TABLE boutique_categorie');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE `user`');
    }
}
