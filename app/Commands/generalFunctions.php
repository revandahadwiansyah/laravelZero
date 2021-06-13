<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class generalFunction extends Command {
    /*
     * Convert string to all uppercase
     */

    public function firstCondition($str) {
        return ($str != null && $str != '') ? strtoupper($str) : '';
    }

    /*
     * Convert string odd to uppercase, even to lowercase
     */

    public function secondCondition($str) {
        /*
         * Filter for string A-Z/a-z
         */

        $newArr = ($str != null && $str != '') ? str_split($str) : null;
        if ($newArr == null)
            return '';

        foreach ($newArr as $key => $data) {
            if ($key % 2 == 0)
                $newArr[$key] = strtolower($data);

            if ($key % 2 != 0)
                $newArr[$key] = ($this->isValid($data) === 1 || $this->isValid($data) === true) ? strtoupper($data) : $data;
        }
        return implode("", $newArr);
    }

    /*
     * Export string to csv file
     */

    public function exportCSV($str) {
        $arrayData = [];
        $newArr = ($str != null && $str != '') ? str_split($str) : null;
        if ($newArr == null)
            return false;

        array_push($arrayData, $newArr);

        $filenames = gmdate("YmdHis") . '_file.csv';
        $delimiter = ',';
        $enclosure = '"';

        $fp = fopen($filenames, 'w');
        foreach ($arrayData as $fields) {
            //fputcsv($fp, (array) $fields);
            fputcsv($fp, (array) $fields, $delimiter, $enclosure);
        }
        fclose($fp);

        return 'CSV created!';
    }

    /*
     * Filter String A-Z, a-z
     */

    function isValid($str) {
        return !preg_match('/[^A-Za-z.#\\-$]/', $str);
    }

}
