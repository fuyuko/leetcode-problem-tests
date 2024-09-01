<!DOCTYPE html>
<html>
<body>

<?php

//Lesson learned: limitation of precision with float after 14 digits

$a1 = "10100000100100110110010000010101111011011001101110111111111101000000101111001110001111100001101";
$b1 = "110101001011101110001111100110001010100001101011101010000011011011001011101111001100000011011110011";

$a2 = "11";
$b2 = "1";

$solution = new Solution();
$result = $solution->addBinary($a1, $b1);
echo "result 1 = " . $result . "\n";

$result = $solution->addBinary($a2, $b2);
echo "result 2 = " .$result;

class Solution {

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b) {
        if(strlen($a) >= strlen($b)){
            return $this->myAddBinary($a,$b);
        }
        return $this->myAddBinary($b,$a);
    }

    function myAddBinary($a, $b) {

        $aa = str_split(strrev($a)); //longer
        $bb = str_split(strrev($b)); //shorter
        $result = "";
        $lastcarry = 0;

        for($x = 0; $x < strlen($b); $x++){
            $current = intval($aa[$x]) + intval($bb[$x]) + $lastcarry;
            $result = strval($current%2) . $result;

            if($current > 1){
                $lastcarry = 1;
            }else{
                $lastcarry = 0;
            }           
        }

        for($x = strlen($b); $x < strlen($a); $x++){
            $current = intval($aa[$x]) + $lastcarry;
            $result = strval($current%2) . $result;

            if($current > 1){
                $lastcarry = 1;
            }else{
                $lastcarry = 0;
            }      
        }

        if($lastcarry){
            $result = "1" . $result;
        }

        return $result;
    }
}

?>

</body>
</html>