<?php

namespace App\Repositories;

use App\Models\Transaction;
use Throwable;

class TransactionRepository extends Repository  {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() : array {
        $statement = $this->db->query("SELECT id, date, checked, description, amount FROM Transaction");
        return $statement->fetchAll();
    }

    public function getResume() {
        $statement = $this->db->query("SELECT
                                            SUM(CASE WHEN amount<0 THEN amount ELSE 0 END) as Expense,
                                            SUM(CASE WHEN amount>0 THEN amount ELSE 0 END) as Income
                                        FROM Transaction    
                                        ");
        return $statement->fetch();
    }

    public function create(Transaction $transaction) {
        $statement = $this->db->prepare('INSERT INTO Transaction (date, checked, description, amount) 
                                    VALUES (:date, :checked, :description, :amount)');

        $statement->execute([
            ':date' => $transaction->date->format('Y-m-d'),
            ':checked' => $transaction->checked,
            ':description' => $transaction->description,
            ':amount' => $transaction->amount
        ]);

        return $this->db->lastInsertId();
    }

    public function createMany(array $transactions) {

        $statement = $this->db->prepare('INSERT INTO Transaction (date, checked, description, amount) 
                                    VALUES (:date, :checked, :description, :amount)');

        try {
            $this->db->beginTransaction();

            foreach($transactions as $transaction) {
                if($transaction instanceof Transaction) {
                    
                    $statement->execute([
                        ':date' => $transaction->date->format('Y-m-d'),
                        ':checked' => $transaction->checked,
                        ':description' => $transaction->description,
                        ':amount' => $transaction->amount
                    ]);
            
                }
            }

        } catch(Throwable $e) {
            if($this->db->inTransaction()) {
                $this->db->rollBack();
            }            
        }

        $this->db->commit();
    }
}