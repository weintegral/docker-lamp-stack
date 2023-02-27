<?php
declare(strict_types=1);
namespace App\models;
class OfficeModel
{
    private MySQLDatabase $database;
    public function __construct()
    {
        $this->database = ObjectContainer::mysqlDB();
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM offices');
        $records = $stmt->fetchAll();

        $output['offices'] = [];
        foreach ($records as $record) {
            $office = [];
            $office['officeCode'] = $record['officeCode'];
            $office['city'] = $record['city'];
            $office['phone'] = $record['phone'];
            $office['addressLine1']=$record['addressLine1'];
            $office['addressLine2']=$record['addressLine1'];
            $office['state']=$record['state'];
            $office['country']=$record['country'];
            $office['postalCode']=$record['postalCode'];
            $office['territory']=$record['territory'];

            $output['offices'][] = $office;
        }

        return $output;
    }

    public function findById(int $id) : array
    {
        $pdo = $this->database->getConnection();
        $stmt=$pdo->query("SELECT * FROM offices WHERE officeCode = {$id}");
        $record = $stmt->fetch();
        if (gettype($record) !== 'array') {
            throw new LogicException('data is not properly retrieved from DB');
        }
        $output['Office data'] = $record;

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
              `offices` (
                `officeCode`,
                `city`,
                `phone`,
                `addressLine1`,
                `addressLine2`,
                `state`,
                `country`,
                `postalCode`,
                `territory`
                
              )
            VALUES
              (
               {$userData['officeCode']},
                '{$userData['city']}',
                '{$userData['phone']}',
                '{$userData['addressLine1']}',
                '{$userData['addressLine2']}',
                '{$userData['state']}',
                '{$userData['country']}',
                '{$userData['postalCode']}',
               {$userData['territory']}
                
                
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
            UPDATE `offices` 
            SET
                `city`='{$userData['city']}',
                `phone`='{$userData['phone']}',
                `addressLine1`= '{$userData['addressLine1']}',
                `addressLine2`=  '{$userData['addressLine2']}',
                `state`= '{$userData['state']}',
                `country` =  '{$userData['country']}'
                `postalCode` ='{$userData['postalCode']}'
                `territory` ={$userData['territory']}
            WHERE `officeCode` = {$id};
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
        $pdo->exec("DELETE FROM offices WHERE officeCode = {$id}");
    }
}