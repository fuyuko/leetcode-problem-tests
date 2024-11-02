<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/gas-station/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;

class Solution {

    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     * 
     * Runtime 9ms beat 63.64%, Memory 28.69MB beats 16.36%
     */
    function canCompleteCircuit($gas, $cost) {
        if(array_sum($cost) > array_sum($gas)) return -1; //having this will make runtime faster.

        $started = false;
        $start = -1;
        $tank = 0;
        $negative_station = array();
        $minus = 0;
        foreach($gas as $i => $g){
            $current = $g - $cost[$i];

            if(!$started){
                if($current >=0){
                    $start = $i;
                    $started = true;
                    $tank = 0;
                    if(($i-1 > -1) && ($negative_station[$i-1] == null)){
                        $negative_station[$i-1] = $minus;
                    }
                    $minus = 0;
                }else{
                    $minus += $current;
                }
                
            }

            if($started){
                $tank += $current;
                if($tank < 0){
                    //record where gas level became unsustanable from station 0
                    $negative_station[$i] = $tank; 

                    //reset
                    $start = -1;
                    $started = false;
                }
            }
        }

        if($start !== -1){
            foreach($negative_station as $i => $deficit){
                if($i < $start){
                    $tank = $tank + $deficit;
                    if($tank < 0) return -1;
                }
            }
        }

        return $start;

    }
}

// Time Limit Excceded before completing the first foreach loop.
class Solution1 {

    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     */
    function canCompleteCircuit($gas, $cost) {
        

        $offset = array();
        $start = array();
        foreach($gas as $i => $in){
            $d = $in - $cost[$i];
            if(($d >=0) && ($start[$i] === null)){
                $start[$i] = 0;
            }
            if($d !== 0){
                $offset[$i] = $d;
                foreach($start as $j => $g){
                    $start[$j] += $offset[$i];
                    if($start[$j] < 0) unset($start[$j]);
                }
            } 
        }

        //reset($start);
        //var_dump($start);
        //var_dump($offset);

        foreach($start as $i => $g){
            $goal = true;
            foreach($offset as $j => $o){
                if($j < $i){
                    $start[$i] += $offset[$j];
                    if($start[$i] < 0) {
                        $goal = false;
                        break;
                    }
                }else{
                    break;
                }
            }
            if($goal) return $i;
        }

        return -1;
    
    }
}

?>

</body>
</html>