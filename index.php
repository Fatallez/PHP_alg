<?php

// 1.

//function isPrime($number) {
//    for($i = 2; $i <= sqrt($number); $i++) {
//        if($number % $i === 0) {
//            return false;
//        }
//    }
//    return true;
//}
//
//function getTopPrime($number) {
//    $stack = new SplStack();
//
//    for ($i = floor(sqrt($number)); $i >= 2; $i--) {
//        if (($number % $i) === 0) {
//          if (isPrime($i)) $stack->push($i)
//        };
//        if (count($stack) === 1) break;
//    }
//
//    echo $stack->pop();
//}
//
//getTopPrime(600851475143);

// 2.


function goForward($path = 'C:/')
{
    $dir = new DirectoryIterator($path);
    $dirPath = $path;

    foreach ($dir as $item) {
        $fileName = $item->getFilename();
        if ($item->isDot()) continue;
        if ($item->isDir()) {
            echo "<a href='?path=$fileName'>$fileName</a><br>";
            if (!empty($_GET['path'])) {
                $dirPath .= $_GET['path'] . '/';
                unset($_GET);
                goForward($dirPath);
            }
        } else echo $fileName . "<br>";
    }
}

goForward();