<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/search-a-2d-matrix/
Lesson learned: 
- the code is a bit messy, but it works. I will try to refactor it later.
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     * 
     * Runtime 0 ms, beats 100%, Memory 20.51mb beats 5.56%
     */
    function searchMatrix($matrix, $target) {

        $rows = count($matrix);
        $columns = count($matrix[0]);
        $center_row_index = intdiv($rows, 2) + $rows%2 - 1;

        if($rows > 1){
            //echo "the row to search = " . $center_row_index . "\n";
            if($matrix[$center_row_index][0] > $target){
                //result should be in smaller rows
                if($center_row_index === 0) return false;
                //echo "smaller row searched.\n";
                $center_row_index = $this->findRow($matrix, 0, $center_row_index-1, $target, $columns);
            }elseif($matrix[$center_row_index][$columns-1] < $target){
                //result is in larger rows
                if($center_row_index === $rows-1) return false;
                //echo "larger row searched.\n";
                $center_row_index = $this->findRow($matrix, $center_row_index+1, $rows-1, $target, $columns);
            }else{
                //echo "center row searched.\n";
                $center_row_index = $this->findRow($matrix, $center_row_index, $center_row_index, $target, $columns);
            }
        }
        //echo "the row to search = " . $center_row_index . "\n";
        //result should be in current rows
        if($center_row_index === -1) return false;

        if($columns === 1){
             if($target === $matrix[$center_row_index][0]) return true;
             return false;
        }
        if($columns === 2){
             if($target === $matrix[$center_row_index][0]) return true;
             if($target === $matrix[$center_row_index][1]) return true;
             return false;
        }

        $center_column_index = intdiv($columns, 2) + $columns%2 - 1;
        //echo "center column = " . $center_column_index ."\n";
        $result = false;

            if($target === $matrix[$center_row_index][$center_column_index]){
                return true;
            }elseif($target < $matrix[$center_row_index][$center_column_index]){
                //result in smaller column
                $result = $this->findMatch($matrix[$center_row_index], 0, $center_column_index-1, $target);
            }elseif($target > $matrix[$center_row_index][$center_column_index]){
                //result in larger column
                $result = $this->findMatch($matrix[$center_row_index], $center_column_index+1, $columns-1, $target);
            }
            
            return $result;
    }

    function findMatch(&$row, $start, $end, &$target){
       
        if($end-$start <= 1){
            if($row[$start] === $target) return true;
            if($row[$end] === $target) return true;
            return false;
        }

        $result = false;
        $center = $start + intdiv(($end - $start),2) + ($end - $start)%2;

        //echo "findmatch -> center column = " . $center ."\n";
        if($row[$center] > $target){
            //result is in smaller rows
            //echo "findmatch -> smaller column searched.\n";
            $result = $this->findMatch($row, $start, $center-1, $target);
        }elseif($row[$center] < $target){
            //result is in larger rows
            //echo "findmatch -> lager column searched.\n";
            $result = $this->findMatch($row, $center+1, max($center+1, $end-1), $target);
        }else{
            return true;
        } 

        return $result;
    }

    function findRow(&$matrix, $start, $end, &$target, &$columns){

        if($end-$start <= 1){
            if(($matrix[$start][0]<= $target) && ($matrix[$start][$columns-1] >= $target)){
                return $start;
            }elseif(($matrix[$end][0] <= $target) && ($matrix[$end][$columns-1] >= $target)){
                return $end;
            }
            else{
                return -1;
            }
        }

        $center = $start + intdiv(($end - $start),2) + ($end - $start)%2;
        //echo "findrow -> start = " . $start . " end = " . $end . " center = " . $center . "\n";
        if($matrix[$center][0] > $target){
            //result is in smaller rows
            if($center <= $start) return -1;
            //echo "findrow -> smaller row searched.\n";
            $center = $this->findRow($matrix, $start, $center-1, $target, $columns);
        }elseif($matrix[$center][$columns-1] < $target){
            if($center >= $end) return -1;
            //echo "findrow -> larger row searched.\n";
            $center = $this->findRow($matrix, $center+1, $end, $target, $columns);
        }else{
            //result should be in current rows
            //echo "findrow -> current row searched.\n";
            if(($matrix[$center][0] <= $target) && ($matrix[$center][$columns-1] >= $target)){
                return $center;
            }
            else{
                return -1;
            }
        } 
        return $center; 
    }
}

?>

</body>
</html>