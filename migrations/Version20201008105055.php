<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201008105055 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_category (id UUID NOT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B1369DBABF396750 ON category_category (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B1369DBA989D9B62 ON category_category (slug)');
        $this->addSql('COMMENT ON COLUMN category_category.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE product_category_product_category (id UUID NOT NULL, product_id UUID NOT NULL, category_id UUID NOT NULL, PRIMARY KEY(id, product_id, category_id))');
        $this->addSql('CREATE INDEX IDX_7AEA1334584665A12469DE2 ON product_category_product_category (product_id, category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7AEA133BF396750 ON product_category_product_category (id)');
        $this->addSql('COMMENT ON COLUMN product_category_product_category.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN product_category_product_category.product_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN product_category_product_category.category_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE product_product (id UUID NOT NULL, active BOOLEAN NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, short_description VARCHAR(255) NOT NULL, long_description TEXT NOT NULL, vendor_code INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2931F1DBF396750 ON product_product (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2931F1D5DD83547 ON product_product (vendor_code)');
        $this->addSql('COMMENT ON COLUMN product_product.id IS \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category_category');
        $this->addSql('DROP TABLE product_category_product_category');
        $this->addSql('DROP TABLE product_product');
    }
}
