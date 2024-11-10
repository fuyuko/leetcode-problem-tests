<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/surrounded-regions/
Lesson learned: 
- I don't think my solution is elegant.
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String[][] $board
     * @return NULL
     * 
     * Runtime 59mns beats 100%, 68.2mb beats 8.33%
     */
    function solve(&$board) {
        $row = count($board);
        $column = count($board[0]);
        if(($row == 1) || ($column == 1)){
            return $board;
        }
        
        $examined = array(array());

        for($r=1; $r < $row-1; $r++){
            for($c=1; $c<$column-1; $c++){
                $region = array(array());
                if($board[$r][$c] === "O"){
                    if(!($this->isExamined($examined, $r, $c))){
                        $region[$r][$c] = 1;
                        $this->findRegion($board, $region, $r, $c);
                        $is_surrounded = $this->isSurrounded($board, $region, $row, $column);

                        if(!$is_surrounded){
                            foreach($region as $rr => $regionR){
                                foreach($regionR as $rc => $regionC){
                                    $examined[$rr][$rc] = 1;
                                }
                            }
                        }
                    }
                }
                
            }
        }

        return $board;
    }

    function findRegion(&$board, &$region, $r, $c){

        if($c > 0){
            if(!($this->isExamined($region, $r, $c-1))){ //left
                if(!$this->isX($board[$r][$c-1])){
                    $region[$r][$c-1] = 1;
                    $this->findRegion($board, $region, $r, $c-1);
                }
            }
        }

        if($r > 0){
            if(!($this->isExamined($region, $r-1, $c))){ //top
                if(!$this->isX($board[$r-1][$c])){
                    $region[$r-1][$c] = 1;
                    $this->findRegion($board, $region, $r-1, $c);
                }
            }
        }

        if($c < (count($board[0])-1)){
            if(!($this->isExamined($region, $r, $c+1))){ //right
                if(!$this->isX($board[$r][$c+1])){
                    $region[$r][$c+1] = 1;
                    $this->findRegion($board, $region, $r, $c+1);
                }
            }
        }

        if($r < count($board)-1){
            if(!$this->isExamined($region, $r+1, $c)){ //bottom
                if(!$this->isX($board[$r+1][$c])){
                    $region[$r+1][$c] = 1;
                    $this->findRegion($board, $region, $r+1, $c);
                }
            }
        }

    }

    function isExamined(&$examined, $r, $c){
        if($examined[$r][$c] !== null){
            return true;
        }
        return false;
    }

    function isX($letter){
        if($letter === "X") return true;
        return false;
    }

    function isSurrounded(&$board, &$region, &$row, &$column){

        if((count($region[0]) > 0) || ($region[$row-1] !== null)){
            return false;
    
        }

        foreach($region as $r){
            if(($r[0]!== null) || ($r[$column-1] !== null)){
                return false;
            }
        }

        foreach($region as $rn => $r){
            foreach($r as $cn => $c){
                $board[$rn][$cn] = "X";
            }
        }

        return true;
    }


}

?>

</body>
</html>