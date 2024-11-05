<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/find-first-and-last-position-of-element-in-sorted-array
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
     * @return Integer[]
     * 
     * Runtime 79ms beats 100%, Memory 21.78MB beats 36.73%
     */
    function searchRange($nums, $target) {
        $length = count($nums);
       //echo "length = " . $length . "\n";
        if($length === 0){
            return array(-1, -1);
        }elseif($length === 1){
            if($target !== $nums[0]){
                return array(-1, -1);
            }   
            return array(0, 0);
        }

        $center = intdiv($length,2) + $length%2 - 1;
        $lower = $higher = false;

        //echo "center = " . $center . "\n";
        //echo $nums[$center] . " ? " . $target . "\n";

       if($nums[$center] === $target){
            if($nums[$center+1] === $target){
                $higher = $this->innerSearchRange($nums, $target, $center+1, $length-1);
            }
            $lower = $this->innerSearchRange($nums, $target, 0, $center);
       }elseif($nums[$center] < $target){
            if($nums[$length - 1] < $target) return array(-1, -1);
            //echo "innersearch - higher executed.\n";
            $higher = $this->innerSearchRange($nums, $target, $center+1, $length-1);
       }else{ //$nums[$center] > $target
            if($nums[0] > $target) return array(-1, -1);
            $lower = $this->innerSearchRange($nums, $target, 0, $center);
       }

       if(($lower === false) && ($higher === false)){
            return array(-1,-1);
       }
       if($lower === false) return $higher;
       if($higher === false) return $lower;
       return array($lower[0], $higher[1]);
        
    }

    function innerSearchRange(&$nums, &$target, $first, $last){
        echo "first = " . $first . " last = " . $last . "\n";
        if($first === $last){
            if($target === $nums[$first]){
                return array($first, $first);
            }
            else{
                return false;
            }
        }
        if($last-$first === 1){
            $zero = $target - $nums[$first];
            $one = $target - $nums[$last];
            if($zero !== 0){
                if($one !== 0) return false;
                if($one === 0) return array($last,$last);
            }{ // $zero === 0
                if($one !== 0) return array($first,$first);
                if($one === 0) return array($first,$last);
            }
        }

        $center = $first + intdiv(($last-$first+1),2) + ($last-$first+1)%2 - 1;
        $lower = $higher = false;

        echo "center = " . $center . "\n";
        echo $nums[$center] . " ? " . $target . "\n";

        if($nums[$center] === $target){
                if($nums[$center+1] === $target){
                    $higher = $this->innerSearchRange($nums, $target, $center+1, $last);
                }
                $lower = $this->innerSearchRange($nums, $target, $first, $center);
        }elseif($nums[$center] < $target){
                if($nums[$last] < $target) return false;
                $higher = $this->innerSearchRange($nums, $target, $center+1, $last);
        }else{ //$nums[$center] > $target
                if($nums[$first] > $target) return false;
                $lower = $this->innerSearchRange($nums, $target, 0, $center);
        }

        if(($lower === false) && ($higher === false)){
                return false;
        }
        if($lower === false) return $higher;
        if($higher === false) return $lower;
        return array($lower[0], $higher[1]);


    }
}

?>

</body>
</html>