<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use App\Tools;
use App\Views\View;

class TransactionController extends Controller{    

    private TransactionRepository $repository;

    public function __construct() {
        $this->repository = new TransactionRepository();
    }

    public function index() {            

        $resumo = $this->repository->getResume();

        $totalIncome = (float)$resumo['Income'];
        $totalExpense = (float)$resumo['Expense'];

        $netTotal = $totalIncome + $totalExpense;
                
        return self::view('/transaction/index', [
            'transactions' => $this->repository->getAll(),
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'netTotal' => $netTotal
        ]);
    }

    public function upload() {        
        return self::view('/transaction/upload');
    }
    
    public function save() {              
        $lines = array();
        foreach($_FILES['transactions']['tmp_name'] as $fileLocation) {
            $lines = array_merge($lines, Tools::readcsv($fileLocation));                    
        }
            
        $transactions = array();
        foreach($lines as $transaction) {
            $transaction = new Transaction(
                    \DateTime::createFromFormat('d/m/Y', $transaction[0]),
                    $transaction[1],
                    $transaction[2],
                    (float)str_replace(['$',','],'',$transaction[3]));                                                    
            $transactions[] = $transaction;
        }

        $this->repository->createMany($transactions);

        self::redirectTo('/transaction');
    }
}
