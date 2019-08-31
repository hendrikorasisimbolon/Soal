<?php

function belah($teks)
{
    $k=3;
    $j=0;
    if(strlen($teks)%3==0){
        for ($i=0; $i < 3 ; $i++) { 
            if($j < (strlen($teks)-$k)){
                echo substr($teks,$j,$k), ", ";
            }
            else{
                echo substr($teks,$j,strlen($teks));
            }
            $j+=$k;
            $k++;
        }
        echo "<br>";
        $k++;
        if($j >= strlen($teks)){
            echo substr($teks,0,$k), ", ";
            $j = $k;
            $k++;
        }
        if ($j < strlen($teks))
        {
            echo substr($teks,$j,strlen($teks));
            $k++;
        }
        echo "<br>";
        $k++;
        if(strlen($teks)>$k){
            echo substr($teks,0,$k),", ";
            $j = $k;
            $k++;
        }
        if($k < strlen($teks)){
             echo substr($teks,$j,strlen($teks));
        }
    }
}

belah("programit"); echo "<br>";
belah("programmerit");
