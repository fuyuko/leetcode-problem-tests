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
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     * 
     * Runtime 13 ms beats 56.67%, Memory 19.72mb beats 97.23%
     */
    function searchInsert($nums, $target) {
        $half = intdiv(count($nums),2);
        $odd = count($nums)%2;
        $result = 0;

        switch($target <=> $nums[$half]){
            case 0:     //equal
                return $half;
            case -1:    //$target less than current value
                if(($half - 1) >= 0){
                    if($nums[$half-1] < $target){
                        return $half;
                    }
                    return $this->searchInsert(array_slice($nums, 0, $half), $target);
                }else{
                    return 0;
                }
                break;
            case 1:     //$target larger than current value
                if(($half + 1) < count($nums)){
                    if($nums[$half+1] > $target){
                        return $half+1;
                    }
                    return $half + $odd + $this->searchInsert(array_slice($nums, $half+$odd), $target);
                }else{
                    return count($nums);
                }
                break;
        }
        return null;  
    }

      
}

?>

</body>
</html>