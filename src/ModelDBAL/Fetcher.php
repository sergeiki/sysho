<?php

declare(strict_types=1);

namespace App\ModelDBAL;

use Doctrine\DBAL\Connection;

class Fetcher
{
    /**
     * @var Connection
     */
    private $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function DeleteAllFromTable(string $table)
    {
        return $this->con->createQueryBuilder()
            ->delete($table)
            ->execute();
    }

    public function findProductIdByVendorCode(string $vendor_code)
    {
        return $this->con->fetchOne("SELECT id FROM product_product WHERe vendor_code = '$vendor_code'");
    }

    public function findCategoryIdBySlug(string $slug)
    {
        return $this->con->fetchOne("SELECT id FROM category_category WHERe slug = '$slug'");
    }

    public function findProductCategoryByProductIdAndCategoryId($product_id, $category_id)
    {
        return $this->con->fetchOne("SELECT id FROM product_category_product_category WHERe product_id = '$product_id' AND category_id = '$category_id'");
    }

    public function findAllCategoryNameAndId()
    {
        // В доке доктрины есть fetchAllKeyValue, но здесь выдает, что нет, поэтому костыли
        $names = $this->con->fetchFirstColumn("SELECT name FROM category_category"); //print_r($names);
        $ids   = $this->con->fetchFirstColumn("SELECT id FROM category_category");
        return array_combine($names, $ids);
    }

    public function findCategoryById($id)
    {
        return $this->con->fetchAssociative("SELECT * from category_category WHERE id = '$id'");
    }

    public function findProductsByCategory($category_id)
    {
        return $this->con->fetchAllAssociative("
            SELECT * 
            FROM product_product p 
                INNER JOIN product_category_product_category pc 
                ON p.id = pc.product_id
            WHERE pc.category_id = '$category_id'
        ");
    }
}