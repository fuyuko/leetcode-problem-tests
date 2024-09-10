<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/summary-ranges/
Lesson learned: 
-
*/
$nums[] = [];
$nums[] = [-1];
$nums[] = [0,2,3,4,6,8,9];
$nums[] = [0,1,2,4,5,7];

$solution = new Solution();
foreach($nums as $num){
    $result = $solution->summaryRanges($num);
    echo "result: \n";
    var_dump($result);
}

/**
 * Runtime 0ms beats 100.00%, Memroy 19.77mb beats 95.88%
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return String[]
     */
    function summaryRanges($nums) {
        
        if(count($nums) == 0) return $nums;
       
        $results = [];
        $start = $nums[0];
        $end = $nums[0];
        for($x=1; $x < count($nums); $x++){ 
           // echo "start = " . $start . " end = " . $end . "\n";

            if($end+1 != $nums[$x]){
                if($start == $end ){
                    $result[] = strval($start);
                }else{
                    $result[] = $start . "->" . $end;
                }
                $start = $nums[$x];
                $end = $start;
            }else{
                $end = $nums[$x];
            }
        }
        if($start == $end ){
            $result[] = strval($start);
        }else{
            $result[] = $start . "->" . $end;
        }

        return $result;
    }
}

?>

</body>
</html>