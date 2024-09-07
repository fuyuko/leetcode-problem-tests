<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/jump-game/
Lesson learned: 
- I'll have to revisit. The accepted solution is very inefficient. Maybe try backward next time.
*/

$nums[] = [2,3,1,1,4];
$nums[] = [3,2,1,0,4];
$nums[] = [2,0,6,9,8,4,5,0,8,9,1,2,9,6,8,8,0,6,3,1,2,2,1,2,6,5,3,1,2,2,6,4,2,4,3,0,0,0,3,8,2,4,0,1,2,0,1,4,6,5,8,0,7,9,3,4,6,6,5,8,9,3,4,3,7,0,4,9,0,9,8,4,3,0,7,7,1,9,1,9,4,9,0,1,9,5,7,7,1,5,8,2,8,2,6,8,2,2,7,5,1,7,9,6];


$solution = new Solution();
foreach($nums as $index => $problem){
    $result = $solution->canJump($problem);
    echo "Problem " . $index+1 . ": ";
    if($result){
        echo "can jump \n";
    }
    else{
        echo "nope. \n";
    }
}

class Solution { // Runtime 620ms beats 5.04%, Memory 24.90MB beats 5.04% - Still very inefficient

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
       

        /* this part will not be repeated - only happens once at $nums[0] */
        $goal = count($nums)-1; //goal location
        $steps = $nums[0];  
        $result = false;

        //echo "current index = " . 0 .  " goal index = " . $goal . "\n";
        //var_dump($nums);

        if(($goal < 1) || ($steps >= $goal)){
            return true;
        }elseif($steps == 0){ // implies $steps== 0 AND $goal > 0
            return false;
        }elseif($steps < $goal){ // implies $steps > 0 AND $goal > 0 AND $steps > $goal
            for($nextIndex = $steps; $nextIndex > 0; $nextIndex--){
                if(array_key_exists($nextIndex, $nums)){
                    if($nums[$nextIndex] != 0){
                        $result = $this->recursion($nums, $goal, $nextIndex);
                        if($result){
                            return true;
                        }
                    }else{
                        unset($nums[$nextIndex]);
                    }
                }
            }
            return false;
        }
        
        return $result;  
    }

    function recursion(&$nums, &$goal, $currentIndex){
        //echo "current index = " . $currentIndex .  " goal index = " . $goal . "\n";
        //var_dump($nums);
        echo "array size = " . count($nums) . "\n";

        $steps = $nums[$currentIndex];  //first element's value
        $result = false;

        if(($goal <= $currentIndex) || ($currentIndex + $steps) >= $goal){
            return true;
        }elseif(($currentIndex + $steps) < $goal){
            for($nextIndex = $currentIndex+$steps; $nextIndex > $currentIndex; $nextIndex--){
                if(array_key_exists($nextIndex, $nums)){
                    if($nums[$nextIndex] != 0){
                        $result = $this->recursion($nums, $goal, $nextIndex);
                        if($result){
                            return true;
                        }
                    }else{
                        unset($nums[$nextIndex]);
                    }
                }
            }
            unset($nums[$currentIndex]);
        }
        return $result;  
    }
   
}


class SolutionInefficient { // Runtime 1116ms beats 5.04%, Memory 24.97MB beats 5.04%

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {

        /* this part will not be repeated - only happens once at $nums[0] */
        $goal = array_key_last($nums); //goal location
        $steps = $nums[0];  
        $result = false;

        //echo "current index = " . 0 .  " goal index = " . $goal . "\n";
        //var_dump($nums);

        if($goal < 1){
            return true;
        }elseif($steps == 0){ // implies $steps== 0 AND $goal > 0
            return false;
        }elseif($steps < $goal){ // implies $steps > 0 AND $goal > 0 AND $steps > $goal
            for($nextIndex = $steps; $nextIndex > 0; $nextIndex--){
                if(array_key_exists($nextIndex, $nums) && ($nums[$nextIndex] != 0)){
                    $result = $this->recursion($nums, $goal, $nextIndex);
                    if($result){
                        return true;
                    }
                }else{
                    unset($nums[$nextIndex]);
                }
            }
            return false;
        }elseif($steps >= $goal){
            return true;
        }
        return $result;  
    }

    function recursion(&$nums, &$goal, $currentIndex){
        //echo "current index = " . $currentIndex .  " goal index = " . $goal . "\n";
        //var_dump($nums);

        $steps = $nums[$currentIndex];  //first element's value
        $result = false;

        if($goal <= $currentIndex){
            return true;
        }elseif($steps == 0){
            return false;
        }elseif(($currentIndex + $steps) < $goal){
            for($nextIndex = $currentIndex+$steps; $nextIndex > $currentIndex; $nextIndex--){
                if(array_key_exists($nextIndex, $nums) && ($nums[$nextIndex] != 0)){
                    $result = $this->recursion($nums, $goal, $nextIndex);
                    if($result){
                        return true;
                    }
                }else{
                    unset($nums[$nextIndex]);
                }
            }
            unset($nums[$currentIndex]);
        }elseif(($currentIndex + $steps) >= $goal){
            return true;
        }
        return $result;  
    }   
}

class SolutionTimeLimitExeeded { //not a submittable solution

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        //var_dump($nums);

        $goal = count($nums) - 1; 
        $steps = $nums[0]; 
        $result = false;

        if(($steps == 0) && ($goal > 0)){
            return false;
        }elseif($steps < $goal){
            for($x = $steps; $x > 0; $x--){
                $result = $this->canJump(array_slice($nums, $x));
                if($result){
                    return $result;
                }
            }
        }else{
            return true;
        }

        return $result;
        
    }
}

?>

</body>
</html>