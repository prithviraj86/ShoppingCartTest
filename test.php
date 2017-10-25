<?php
// $string="1,2,3,4";
// $array=explode(",",$string);
// $array1=array_reverse($array);
// $last_val=array_shift($array1);
// $array2=array_reverse($array1);
// $last_val2=array_shift($array2);

// $array3=array_reverse($array2);
// array_push($array3,$last_val);
// array_push($array3,$last_val2);
// $final=implode(",",array_reverse($array3));
// echo $final;
//print_r(array_merge($chunked[0],array_reverse($chunked[1])));
$string="1,2,3,4";

$array=explode(",",$string);
$array1=$array;
array_splice($array1, 1, -1);
$newarray = array_slice($array, 1, -1);
$final_array=array_merge($array1,$newarray);
echo implode(",",$final_array);
?>