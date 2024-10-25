<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="admin.php">Admin</a></li>
        </ul>
    </nav>
</header>

<?php

//include './helpers.php';

// Arrayin meethodlari.

//$array = ['menu1' => 'Home', 'menu2' => 'About', 'menu3' => 'Contact', 'menu4' => 'Login', 'menu5' => 'Register'];
//
//$chunkedArr = array_chunk($array, 2);
//
//echo "<pre>";
//print_r($chunkedArr);
//echo "</pre>";

//$keys = ['iphone', 'samsung', 'hp'];
//$values = [122, 234, 344];
//
//$compninedArr = array_combine($keys, $values);
//
//echo "<pre>";
//print_r($compninedArr);
//echo "</pre>";
//
//echo $compninedArr['iphone'];

//$array = [1, 2, 3, 4, 5];
//
//$filteredArray = array_filter($array, function ($value) {
//    return $value % 2 === 0;
//});
//
//print_r_correctly($filteredArray);

//$input = array("red", "green", "blue", "yellow");
//array_splice($input, 1, 1, "orange");
//
//print_r_correctly($input);

//$array = [1 => 'a', 3 => 'b', 5 => 'c'];

//$keys = array_keys($array);
//
//print_r_correctly($keys);

//$values = array_values($array);
//
//print_r_correctly($values);

//function test($callback, $b){
//    return $callback() + $b;
//}
//
//echo test(fn() => 5, 2);

//$array = [1, 2, 3];
//
//$squared = array_map(function ($x) {
//    return $x * $x;
//}, $array);
//
//print_r_correctly($squared);

//$array1 = [1, 2];
//$array2 = [3, 4];
//
//$merged = [...$array2, ...$array1]; // [1, 2, 3, 4]
//
//print_r_correctly($merged);
//
//$array = ['a' => 1, 'b' => 2, 'c' => 3];
//
//$key = array_search(2, $array);
//
//echo $key;

//$array = [1, 2, 3];
//
//$ex = in_array(3, $array);
//
//var_dump($ex);

//$array1 = [1, 2, 3];
//$array2 = [2, 3, 4];
//$diff = array_diff($array2, $array1);
//print_r_correctly($diff);

//$array1 = ['a' => 1, 'b' => 2];
//$array2 = ['a' => 1, 'c' => 3];
//$difference = array_diff_key($array1, $array2);
//print_r_correctly($difference);

//$array = ['b' => 3, 'a' => 1, 'c' => 2];
//
//asort($array);
//
//print_r_correctly($array);

//print_r_correctly(get_defined_functions());

//var_dump(function_exists('print_r_correctly'));

//$array = ['John', 'Doe', '43', 'test'];
//
//[$firstName, ,$age] = $array;
//
//echo $firstName . ' ' . $age;

//phpinfo();
//echo ini_get('max_execution_time') . "<br>";
//
//ini_set('max_execution_time', 40);
//
//echo ini_get('max_execution_time');


//if(isset($_REQUEST['ad'])){
//    echo "Adiniz: " . $_REQUEST['ad'] . "<br>";
//}
//if(isset($_REQUEST['soyad'])){
//    echo "Soyad: " . $_REQUEST['soyad'] . "<br>";
//}
//if(isset($_REQUEST['sifre'])){
//    echo "Sifre: " . $_REQUEST['sifre'] . "<br>";
//}

//if($_SERVER['REQUEST_METHOD'] == 'POST'){
//    echo "POST metodu calisdi";
//}elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
//    echo "GET metodu calisdi";
//}
