<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;
define('APP_ROOT', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_ROOT', $root . 'files' . DIRECTORY_SEPARATOR);
define('VIEWS_ROOT', $root . 'views' . DIRECTORY_SEPARATOR);

require_once APP_ROOT . 'helpers.php';

$files = getTransactionFiles(FILES_ROOT);

$transactions = [];

foreach ($files as $file) {
    $transactions = array_merge($transactions, getTransactions($file));
}


//print_pre($transactions);

require_once VIEWS_ROOT . 'transactions.php';