<?php

declare(strict_types = 1);

function print_pre(array $array): void
{
    echo "<pre>";
        print_r($array);
    echo "</pre>";
}

//function getTransactions($file): void {
//    while(($line = fgetcsv($file)) !== false) {
//        echo $line . "<br>";
//    }
//}

function getTransactionFiles(string $dirPath): array {
    $files = [];

    foreach (scandir($dirPath) as $file){
        if(is_dir($file)) continue;
        $files[] = $dirPath . $file;
    }

    return $files;
}

function getTransactions(string $fileName): array
{
    if(!file_exists($fileName)){
        trigger_error("This $fileName not found", E_USER_ERROR);
    }

    $file = fopen($fileName, "r");
    fgets($file);
    $transactions = [];

    while (($transaction = fgetcsv($file)) !== false) {
        $transactions[] = extractTransaction($transaction);
    }

    return $transactions;
}

//[0] => Array
//(
//    [0] => 01/04/2021
//            [1] => 7777
//            [2] => Transaction 1
//            [3] => $150.43
//        )

function extractTransaction(array $transaction): array
{
    [$date, $checkName, $description, $amount] = $transaction;
    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
      'date' => $date,
      'checkName' => $checkName,
      'description' => $description,
      'amount' => $amount,
    ];
}

function formatDate(string $date): string{
    return date("M, j, Y", strtotime($date));
}