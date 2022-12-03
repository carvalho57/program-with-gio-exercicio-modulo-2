<?php

namespace App\Repositories;

use App\Models\Transaction;
use Throwable;

class TransactionRepository extends Repository  {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() : array {
        $this->db->query("SELECT id, date, checked, description, amount FROM Transaction");
        return $this->db->fetchAll();
    }

    public function create(Transaction $transaction) {
        $this->db->prepare('INSERT INTO Transaction (date, checked, description, amount) 
                                    VALUES (:date, :checked, :description, :amount)');

        $this->db->execute([
            ':date' => $transaction->date,
            ':checked' => $transaction->checked,
            ':description' => $transaction->description,
            ':amount' => $transaction->amount
        ]);

        return $this->db->lastInsertId();
    }

    public function createMany(array $transactions) {
        $this->db->prepare('INSERT INTO Transaction (date, checked, description, amount) 
                                    VALUES (:date, :checked, :description, :amount)');

        try {
            $this->db->beginTransaction();

            foreach($transactions as $transaction) {
                if($transaction instanceof Transaction) {
                    
                    $this->db->execute([
                        ':date' => $transaction->date,
                        ':checked' => $transaction->checked,
                        ':description' => $transaction->description,
                        ':amount' => $transaction->amount
                    ]);
            
                }
            }
        } catch(Throwable $e) {
            $this->db->rollBack();
        }

        $this->db->commit();
    }
}