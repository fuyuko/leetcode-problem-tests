<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/number-of-islands/
Lesson learned: 
-  remove the test code before submitting
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String[][] $grid
     * @return Integer
     * 
     * Runtime 87ms beats 92.54%, Memory 35.19mb beats 95.92%
     */
    function numIslands($grid) {
        $current = $grid[0][0];
        $result = 0;
        for($i = 0; $i < count($grid); $i++){
            for($j = 0; $j < count($grid[$i]); $j++){
                if($grid[$i][$j] === "1"){
                    //check four direction
                    $result++;
                    $grid[$i][$j] = null;
                    if($i-1 >= 0){
                        if($grid[$i-1][$j] === "1"){
                            $this->isIsland($grid, $grid[$i-1][$j], $i-1, $j);
                        }
                    }
                    if($i+1 < count($grid)){
                        if($grid[$i+1][$j] === "1"){
                            $this->isIsland($grid, $grid[$i+1][$j], $i+1, $j);
                        }
                         
                    }
                    if($j+1 < count($grid[$i])){
                        if($grid[$i][$j+1] === "1"){
                            $this->isIsland($grid, $grid[$i][$j+1], $i, $j+1);
                        }
                        
                    }
                    if($j-1 >=0){
                        if($grid[$i][$j-1] === "1"){
                            $this->isIsland($grid, $grid[$i][$j-1], $i, $j-1);
                        }
                        
                    }
                }
            }
        }

        return $result;
    }

    function isIsland(&$grid, &$current, $i, $j){
        $current = null;
        //echo "i = " . $i . "\n";
        //var_dump($grid[$i]);
        if($i-1 >= 0){
            if($grid[$i-1][$j] === "1"){
                $this->isIsland($grid, $grid[$i-1][$j], $i-1, $j);
            }
        }
        if($i+1 < count($grid)){
            if($grid[$i+1][$j] === "1"){
                $this->isIsland($grid, $grid[$i+1][$j], $i+1, $j);
            }
                
        }
        if($j+1 < count($grid[$i])){
            if($grid[$i][$j+1] === "1"){
                $this->isIsland($grid, $grid[$i][$j+1], $i, $j+1);
            }
            
        }
        if($j-1 >=0){
            if($grid[$i][$j-1] === "1"){
                $this->isIsland($grid, $grid[$i][$j-1], $i, $j-1);
            }
            
        }
    }
}

?>

</body>
</html>