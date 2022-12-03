<?php

declare(strict_types=1);

namespace App\Models;

class Transaction {
    protected \Datetime $date;
    protected string $checked;
    protected string $description;
    protected float $amount;

    public function __construct(\Datetime $date, string $checked, string $description, float $amount) {        
        $this->date = $date;
        $this->checked = $checked;
        $this->description = $description;
        $this->amount = $amount;
    }   
}