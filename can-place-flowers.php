<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: 
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     * 
     * runtime: 3ms beats 94.89%, memory: 21.21mb beats 71.02%
     */
    function canPlaceFlowers($flowerbed, $n) {
        $occupied = false;
        $max = 0;

        foreach($flowerbed as $i => $spot){
            if($spot === 0){
                if(!$occupied){
                    if(
                        (($i+1 < count($flowerbed)) && ($flowerbed[$i+1] === 0)) || 
                        ($i+1 === count($flowerbed))
                    ){
                        $max++;
                        $occupied = true;
                    }else{
                        $occupied = false;
                    }
                }else{
                    $occupied = false;
                }
            }else{
                $occupied = true;
            }
        }

        return ($max >= $n);
    }
}

?>

</body>
</html>