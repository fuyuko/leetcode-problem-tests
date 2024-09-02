<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/plus-one/description/
Lesson learned:  
- another problem dealing with limitation of float
- copying entire array takes up time & memory -> avoid if you can
*/

$digits = array(9);
$solution = new Solution();
$result = $solution->plusOne($digits);
var_dump($result);

class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */

    //solution - runtime 0ms beats 100%, memory 10.84MB beats 79.23%
    function plusOne($digits) {
        $d = array();
        $index = count($digits)-1;
        $increment = true;

        for($x = $index; $x > -1; $x--){
            $n = $digits[$x];
            if($increment){
                $n++;
            }
            if($n > 9){
                array_unshift($d, 0);
                $increment = true;
                if($x == 0){
                    array_unshift($d, 1);
                    break;
                }
            }else{
                $increment = false;
                array_unshift($d, $n);
            }
        }

        return $d;
        
    }

    //works with int but not with float
    function plusOneLimited($digits) {
        $num =  intval(implode($digits));
        return str_split(strval($num+1));
    }
}

?>

</body>
</html>