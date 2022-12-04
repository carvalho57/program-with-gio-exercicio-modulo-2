<?php

declare(strict_types=1);

namespace App;

class Tools {
    public static function readcsv($fileLocation) {
        if( ($handle = fopen($fileLocation, 'r')) !== false) {                                                
            while( ($data = fgetcsv($handle, 1000)) !== false) {                                                                                                                        
                $lines[] = $data;
            }

            array_shift($lines);
        }     

        return $lines;
    }
}