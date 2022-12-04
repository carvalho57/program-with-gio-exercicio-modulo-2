<?php

declare(strict_types=1);

namespace App\Models;

class Transaction {
    public \Datetime $date;
    public string $checked;
    public string $description;
    public float $amount;

    public function __construct(\Datetime $date, string $checked, string $description, float $amount) {        
        $this->date = $date;
        $this->checked = $checked;
        $this->description = $description;
        $this->amount = $amount;
    }   

    public function __toString() {
        return $this->date->format('Y-m-d') . " - {$this->checked} - {$this->description}";
    }
}