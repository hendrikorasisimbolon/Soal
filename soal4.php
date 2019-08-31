<?php

function bubble_Sort($arr )
{
	do
	{
        $swap = false;
        $c = strlen($arr) - 1;
		for( $i = 0; $i < $c; $i++ )
		{
			if( (int)$arr[$i] > (int)$arr[$i + 1] )
			{
				list( $arr[$i + 1], $arr[$i] ) =
						array( $arr[$i], $arr[$i + 1] );
				$swap = true;
			}
		}
	}
	while( $swap );
return $arr;
}

function split($text)
{
    $str = explode("0",$text);
    for ($i=0 ; $i < count($str); $i++ ) { 
        echo bubble_Sort($str[$i]);
    }
}

split("5956560159466056");