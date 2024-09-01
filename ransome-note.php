<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/ransom-note/description/
*/

$magazine = "b";
$ransomeNote = "aa";
$mArray = str_split($magazine);
$rArray = str_split($ransomeNote);
$result = true;

foreach($rArray as $letter){
 
    if(count($mArray) < 1) {
        $result = false;
    }
    $key = array_search($letter, $mArray);
    echo "key = " . $key ."\n";
    if($key != ""){
        echo "mArray{key] = " . $mArray[$key] . "\n";
        unset($mArray[$key]);
    }else{
        $result = false;
    }
    var_dump($mArray);
}

var_dump($result);

?>

</body>
</html>