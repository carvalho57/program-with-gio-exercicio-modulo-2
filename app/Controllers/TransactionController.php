<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repositories\TransactionRepository;
use App\Views\View;

class TransactionController {    

    private TransactionRepository $repository;

    public function __construct() {
        $this->repository = new TransactionRepository();
    }

    public function index() {        
        return View::render('transaction/index', [
            'transactions' => $this->repository->getAll()
        ]);
    }

    public function upload() {
        return View::render('upload');
    }
    
    public function save() {
        
    }
}