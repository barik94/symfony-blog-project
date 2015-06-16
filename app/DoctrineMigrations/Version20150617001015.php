<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150617001015 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, blog_id INT DEFAULT NULL, user VARCHAR(255) NOT NULL, comment LONGTEXT NOT NULL, approved TINYINT(1) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_9474526CDAE07E97 (blog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(100) NOT NULL, password VARCHAR(64) NOT NULL, salt VARCHAR(32) NOT NULL, email VARCHAR(60) NOT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE user_role (user_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_2DE8C6A3A76ED395 (user_id), INDEX IDX_2DE8C6A3D60322AC (role_id), PRIMARY KEY(user_id, role_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, role VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_57698A6A57698A6A (role), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Category (id INT AUTO_INCREMENT NOT NULL, catName VARCHAR(255) NOT NULL, quantOfPosts INT NOT NULL, slug VARCHAR(255) NOT NULL, isDefault TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(100) NOT NULL, blog LONGTEXT NOT NULL, image VARCHAR(20) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_C015514312469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE post_tags (post_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_A6E9F32D4B89032C (post_id), INDEX IDX_A6E9F32DBAD26311 (tag_id), PRIMARY KEY(post_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE comment ADD CONSTRAINT FK_9474526CDAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id)");
        $this->addSql("ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE blog ADD CONSTRAINT FK_C015514312469DE2 FOREIGN KEY (category_id) REFERENCES Category (id)");
        $this->addSql("ALTER TABLE post_tags ADD CONSTRAINT FK_A6E9F32D4B89032C FOREIGN KEY (post_id) REFERENCES blog (id)");
        $this->addSql("ALTER TABLE post_tags ADD CONSTRAINT FK_A6E9F32DBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE post_tags DROP FOREIGN KEY FK_A6E9F32DBAD26311");
        $this->addSql("ALTER TABLE user_role DROP FOREIGN KEY FK_2DE8C6A3A76ED395");
        $this->addSql("ALTER TABLE user_role DROP FOREIGN KEY FK_2DE8C6A3D60322AC");
        $this->addSql("ALTER TABLE blog DROP FOREIGN KEY FK_C015514312469DE2");
        $this->addSql("ALTER TABLE comment DROP FOREIGN KEY FK_9474526CDAE07E97");
        $this->addSql("ALTER TABLE post_tags DROP FOREIGN KEY FK_A6E9F32D4B89032C");
        $this->addSql("DROP TABLE tag");
        $this->addSql("DROP TABLE comment");
        $this->addSql("DROP TABLE user");
        $this->addSql("DROP TABLE user_role");
        $this->addSql("DROP TABLE role");
        $this->addSql("DROP TABLE Category");
        $this->addSql("DROP TABLE blog");
        $this->addSql("DROP TABLE post_tags");
    }
}
