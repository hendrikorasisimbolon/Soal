<?php
function isPrime($n) 
{ 
    if ($n <= 1) 
        return false; 

    for ($i = 2; $i < $n; $i++) 
        if ($n % $i == 0) 
            return false; 
  
    return true; 
} 

$prima = [];

$input = 0;
if((int)isset($_GET['input'])>0 && (int)isset($_GET['input']) < 10){
    $input = $_GET['input'];
}

for ($i=1; $i <= ($input*2)+5; $i++) { 
    if(isPrime($i))
       $prima[] = $i;
}


for ($i=0; $i < $input; $i++) { 
    for($j=0; $j<=$i; $j++){
        echo strval($prima[$j]) , " ";
    }
    echo "<br>";  
}