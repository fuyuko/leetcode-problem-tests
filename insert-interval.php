<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/insert-interval/
Lesson learned: 
- array_splice() is a good function to insert an element into an array at a specific index.
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     * 
     * Runtime 1ms beats 100% Memory 24.76MB beats 45.76%
     */
    function insert($intervals, $newInterval) {
        //$newInterval[0] = start, $newInterval[1] = end

        if(count($intervals) === 0) return array($newInterval);

        $result = $intervals;

        for($i = 0; $i < count($intervals); $i++){
            //if start of the new interval is higher than the current interval's end value
            if($this->posInteval($intervals[$i], $newInterval[0]) === 1){
                if($i === count($intervals)-1){ //last interval
                        $result[] = $newInterval;
                        break;
                }
                continue; //check the next interval 
            }
            //if start of the new interval within the current interval
            if($this->posInteval($intervals[$i], $newInterval[0]) === 0){
                //if end of the new interval within in the current interval
                if($this->posInteval($intervals[$i], $newInterval[1]) === 0){
                    break; //do nothing. the new interval is obsorved in the existing interval.    
                }
                if($this->posInteval($intervals[$i], $newInterval[1]) === 1){
                   //$i = the existing interval that's starting
                   if($i === count($intervals)-1){ //last interval
                        $result[$i][1] = $newInterval[1];
                        break;
                   }else{
                        for($j=$i+1; $j < count($intervals); $j++){
                            if($this->posInteval($intervals[$j], $newInterval[1]) === -1){
                                $result[$i][1] = $newInterval[1];
                                break;
                            }
                            if($this->posInteval($intervals[$j], $newInterval[1]) === 0){
                                $result[$i][1] = $intervals[$j][1];
                                unset($result[$j]);
                                break;
                            }
                            if($this->posInteval($intervals[$j], $newInterval[1]) === 1){
                                if($j === count($intervals)-1){ //last interval
                                    $result[$i][1] = $newInterval[1];
                                    unset($result[$j]);
                                    break;
                                }
                                unset($result[$j]);
                                continue;
                            }
                        }
                        break;
                   } 
                }
            }
            //if start of the new interval is lower than the current interval's start value
            if($this->posInteval($intervals[$i], $newInterval[0]) === -1){
                //if end of the new interval lower than the current interval's start value
                if($this->posInteval($intervals[$i], $newInterval[1]) === -1){
                    //insert the new intervals before the current interval
                    array_splice($result, $i, 0, array($newInterval));
                    //var_dump($result);
                    break; 
                }
                //if end of the new interval is within the current interval
                if($this->posInteval($intervals[$i], $newInterval[1]) === 0){
                    //merge the current interval and the new Interval (= replace the current interval's start value)
                    $result[$i][0] = $newInterval[0];
                    break; 
                }
                //if end of the new interval is higher than current interval
                if($this->posInteval($intervals[$i], $newInterval[1]) === 1){
                    $result[$i][0] = $newInterval[0];
                    //var_dump($result);

                    if($i === count($intervals)-1){
                        $result[$i][1] = $newInterval[1];
                        break;
                    }
                    for($j=$i+1; $j < count($intervals); $j++){
                        if($this->posInteval($intervals[$j], $newInterval[1]) === -1){
                            $result[$i][1] = $newInterval[1];
                            break;
                        }
                        if($this->posInteval($intervals[$j], $newInterval[1]) === 0){
                            $result[$i][1] = $intervals[$j][1];
                            unset($result[$j]);
                            break;
                        }
                        if($this->posInteval($intervals[$j], $newInterval[1]) === 1){
                            if($j === count($intervals)-1){ //last interval
                                $result[$i][1] = $newInterval[1];
                                unset($result[$j]);
                                break;
                            }
                            unset($result[$j]);
                            continue;
                        }
                    }
                }
                break;
            }
        }
        
        return $result;
    }

    /**
     * @param Integer[] $interval
     * @param Integer $num
     * @return Integer $result, -1 if lower than the interval, 0 if in the interval, 1 if higher than the interval
     */
    function posInteval($interval, $num){
        if($num < $interval[0]) return -1;
        if($num > $interval[1]) return 1;
        return 0;
    }
}

?>

</body>
</html>