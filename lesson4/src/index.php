<?php
    header('Access-Control-Allow-Origin: *');

    require_once __DIR__ . '/vendor/autoload.php';

    use Webit\Wrapper\BcMath\BcMathNumber;


    $num = new BcMathNumber('123.1233');
    $result = $num->add('13.22')->mul((string)time())->div("1000000000.0");
    echo $result;