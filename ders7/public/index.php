<?php

declare(strict_types=1);

use App\app\Payment;
use App\app\Car;

//include __DIR__ . '/../vendor/autoload.php';
//include '../src/app/Payment.php';
//
//use app\Payment;

//$payment1 = new Payment("12-09-2024");
//$payment2 = new Payment("12-10-2024");
//$payment3 = new Payment("12-10-2024");
//$payment4 = new Payment("12-10-2024");
//$payment5 = new Payment("12-10-2024");

//var_dump(Payment::getStatus());
//var_dump(Payment::$paymentDate);
//
//var_dump($payment1::getStatus());
//var_dump(Payment::$paymentCount);

// payments // 3, where(user_id, 5) => arr -> count(arr) // 2
// id, user_id, amount
// 1,   5,        150
// 2,   2,        100
// 3,   5,        290

// users
// id, name, phone
// 1,  fazil, 239847347
// 2,  kamil, 2384763274
// ...
// 5, kenan, 2347632467237

//use app\Payment;
//
//spl_autoload_register(function ($class){
//    include '../' . $class . '.php';
//});
//
//$payment = new Payment("11-10-2023");
//
//var_dump($payment);

//use app\Payment;
//

//var_dump(__DIR__);
//
//echo "<br>";

//$file = __DIR__ . '/../' . str_replace('\\', '/', 'src/app/Payment') . '.php';
//var_dump($file);
//spl_autoload_register(function ($class) {
//    $file = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
//    var_dump($file);
//    if (file_exists($file)) {
//        include $file;
//    } else {
//        throw new \Exception("File not found: $file");
//    }
//});
//
//
//try {
//    $payment = new Payment("11-10-2023");
//    var_dump($payment);
//} catch (\Exception $e) {
//    echo "Error: " . $e->getMessage();
//}


//$payment = new Payment("12-12-12");
//
//var_dump($payment);
//
//$car = new Car();
//
//var_dump($car);

//$todos = new \App\app\Todos();
//
//\App\Helpers\Helper::print_pre($todos->getTodos());