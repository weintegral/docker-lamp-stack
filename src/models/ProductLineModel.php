<?php
declare(strict_types=1);
namespace App\models;

use App\utils\MySQLDatabase;
use App\utils\ObjectContainer;
use LogicException;
use PDOException;
class ProductLineModel
{
    private MySQLDatabase $database;

    public function __construct()
    {
        $this->database = ObjectContainer::mysqlDB();
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM productlines');
        $records = $stmt->fetchAll();

        $output['productlines'] = [];
        foreach ($records as $record) {
            $productline = [];
            $productline['productLine'] = $record['productLine'];
            $productline['textDescription'] = $record['textDescription'];
            $productline['htmlDescription'] = $record['htmlDescription'];
            $productline['image'] = $record['image'];


            $output['productlines'][] = $productline;
        }

        return $output;
    }

    public function findById(string $id) : array

    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM productlines WHERE productLine = '{$id}'" );
        $record = $stmt->fetch();
        if (gettype($record) !== 'array') {
            throw new LogicException('data is not properly retrieved from DB');
        }
        $output['ProductLines data'] = $record;

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
              `productlines` (
                `productLine`,
                `textDescription`,
                `htmlDescription`,
                `image`
                
              )
            VALUES
              (
               {$userData['productLine']},
                '{$userData['textDescription']}',
                '{$userData['htmlDescription']}',
               {$userData['image']}
                
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
            UPDATE `prodcutlines` 
            SET
                `textDescription`='{$userData['textDescription']}',
                `htmlDescription`= '{$userData['htmlDescription']}',
                `image` = {$userData['image']}
            WHERE `productLine` = {$id};
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
        $pdo->exec("DELETE FROM productlines WHERE productLine = {$id}");
    }
}