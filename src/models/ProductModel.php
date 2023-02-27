<?php
declare(strict_types=1);
namespace App\models;
namespace App\models;
namespace App\models;
class ProductModel
{
    private MySQLDatabase $database;

    public function __construct()
    {
        $this->database = ObjectContainer::mysqlDB();
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM products');
        $records = $stmt->fetchAll();
        //echo '<pre>';
        $output['products'] = [];
        foreach ($records as $record) {
            //var_dump($records);
            //echo '<br><br><br>';
            $product = [];
            $product['productCode'] = $record['productCode'];
            $product['productName'] = $record['productName'];
            $product['productLine'] = $record['productLine'];
            $product['productScale'] = $record['productScale'];
            $product['productVendor'] = $record['productVendor'];
            $product['productDescription'] = $record['productDescription'];
            $product['quantityInStock'] = $record['quantityInStock'];
            $product['buyPrice'] = $record['buyPrice'];
            $product['MSRP'] = $record['MSRP'];

            $output['products'][] = $product;
        }

        return $output;
    }

    public function findById(string $id): array
    {
        $pdo=$this->database->getConnection();
        $stmt=$pdo->query("SELECT * FROM products WHERE productCode = '{$id}'");
        $record = $stmt->fetch();
        if (gettype($record) !== 'array') {
            throw new LogicException('data is not properly retrieved from DB');
        }
        $output['Products data'] = $record;

        return $output;
    }

    /**
     * @throws PDOException
     */
    public function insert(array $userData): void
    {
        $pdo = $this->database->getConnection();
        $sql = <<< INSERT_SQL
            INSERT INTO
              `products` (
                `productCode`,
                `productName`,
                `productLine`,
                `productScale`,
                `productVendor`,
                `productDescription`,
                `quantityInStock`,
                `buyPrice`,
                `MSRP`
                
              )
            VALUES
              (
               {$userData['productCode']},
                '{$userData['productName']}',
                '{$userData['productLine']}',
               {$userData['productScale']},
                '{$userData['productVendor']}',
                '{$userData['productDescription']}',
                '{$userData['quantityInStock']}',
                '{$userData['buyPrice']}',
                '{$userData['MSRP']}'
                
              );
INSERT_SQL;
        $pdo->exec($sql);
//>>>>>>> a748f8a82a895f879d1aa5f18f9591087dd612b9
    }

    /**
     * @throws PDOException
     */
    public function update(int $id, array $userData): void
    {
        $pdo = $this->database->getConnection();
        $sql = <<< UPDATE_SQL
            UPDATE `products` 
            SET
                `productName`= '{$userData['productName']}',
                `productLine`= '{$userData['productLine']}',
                `productScale`= {$userData['productScale']},
                `productVendor`= '{$userData['productVendor']}',
                `productDescription`= '{$userData['productDescription']}',
                `quantityInStock`= '{$userData['quantityInStock']}',
                `buyPrice`= '{$userData['buyPrice']}',
                `MSRP`= '{$userData['MSRP']}'
            WHERE `productCode` = {$id};
              ;
UPDATE_SQL;
        $pdo->exec($sql);
    }

    /**
     * @throws PDOException
     */
    public function delete(int $id): void
    {
        $pdo = $this->database->getConnection();
        $pdo->exec("DELETE FROM products WHERE productCode = {$id}");
    }
}