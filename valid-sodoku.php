<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: 
Lesson learned: 
- there is no diagonal rules in sodoku...at this this version doesn't. Need to remove those rules
- need to read the problem description more carefully.
*/

$board = [["5","3",".",".","7",".",".",".","5"],["6",".",".","1","9","5",".",".","."],[".","9","8",".",".",".",".","6","."],["8",".",".",".","6",".",".",".","3"],["4",".",".","8",".","3",".",".","1"],["7",".",".",".","2",".",".",".","6"],[".","6",".",".",".",".","2","8","."],[".",".",".","4","1","9",".",".","5"],[".",".",".",".","8",".",".","7","9"]];
$board2 = [["8","3",".",".","7",".",".",".","."],["6",".",".","1","9","5",".",".","."],[".","9","8",".",".",".",".","6","."],["8",".",".",".","6",".",".",".","3"],["4",".",".","8",".","3",".",".","1"],["7",".",".",".","2",".",".",".","6"],[".","6",".",".",".",".","2","8","."],[".",".",".","4","1","9",".",".","5"],[".",".",".",".","8",".",".","7","9"]];
$board3 = [
    [".",".",".",".",".",".",".",".","2"],
    [".",".",".",".",".",".","6",".","."],
    [".",".","1","4",".",".","8",".","."],
    [".",".",".",".",".",".",".",".","."],
    [".",".",".",".",".",".",".",".","."],
    [".",".",".",".","3",".",".",".","."],
    ["5",".","8","6",".",".",".",".","."],
    [".","9",".",".",".",".","4",".","."],
    [".",".",".",".","5",".",".",".","."]];
$board4 = [
    [".",".",".",".","5",".",".","1","."],
    [".","4",".","3",".",".",".",".","."],
    [".",".",".",".",".","3",".",".","1"],
    ["8",".",".",".",".",".",".","2","."],
    [".",".","2",".","7",".",".",".","."],
    [".","1","5",".",".",".",".",".","."],
    [".",".",".",".",".","2",".",".","."],
    [".","2",".","9",".",".",".",".","."],
    [".",".","4",".",".",".",".",".","."]];
$board5 = [ //test case for 3x3 box array creation
        ["1","1","1","2","2","2","3","3","3"],
        ["1","1","1","2","2","2","3","3","3"],
        ["1","1","1","2","2","2","3","3","3"],
        ["4","4","4","5","5","5","6","6","6"],
        ["4","4","4","5","5","5","6","6","6"],
        ["4","4","4","5","5","5","6","6","6"],
        ["7","7","7","8","8","8","9","9","9"],
        ["7","7","7","8","8","8","9","9","9"],
        ["7","7","7","8","8","8","9","9","9"]];

$solution = new Solution();

$result = $solution->isValidSudoku($board4);
//$result = $solution->findDup($board[0]);
if($result){
    echo "is valid.";
}else{
    echo "is not valid";
}

 /**
  * Runtime 29ms beats 77.24%, Memory 20.12MB beats 22.76%
  */
class Solution {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        $dupFound = false;

        for($x=0; $x < 9; $x++){
            
            $dupFound = $this->findDup($board[$x]); //check row

            if($dupFound){
                //echo "dupe found in row: \n";
                //var_dump($board[$x]);
                return false;
            }

            $column = [];
            for($y=0; $y < 9; $y++){
                $column[] = $board[$y][$x];
            }
            $dupFound = $this->findDup($column); //check row
            if($dupFound){
                //echo "dupe found in column: \n";
                //var_dump($column);
                return false; // dupFound = invalid board -> false;
            }
        }

        for($x=0; $x < 3; $x++){
            $square = [[],[],[]];
            for($y=0; $y < 3; $y++){
                $square[0] = array_merge($square[0], array_slice($board[$y+($x*3)], 0, 3));
                $square[1] = array_merge($square[1], array_slice($board[$y+($x*3)], 3, 3));
                $square[2] = array_merge($square[2], array_slice($board[$y+($x*3)], 6, 3));
            }
            //var_dump($square);
            foreach($square as $s){
                $dupFound = $this->findDup($s);
                if($dupFound){
                    //echo "dupe found in s: \n";
                    //var_dump($s);
                    return false; // dupFound = invalid board -> false;
                }
            }   
        }

        return (!$dupFound);
    }

    function findDup($array){
        $counter = [];
        foreach($array as $key => $element){
            //var_dump($element);
            if($element != "."){
                if(!array_key_exists($element, $counter)){
                    $counter[$element] = 1; 
                }else{
                    return true;
                }
            }
        }
        return false;
    }

}

class SolutionWithDiagonalRule {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        $dia1 = [];
        $dia2 = [];
        $dupFound = false;

        for($x=0; $x < 9; $x++){
            
            $dupFound = $this->findDup($board[$x]); //check row

            if($dupFound){
                //echo "dupe found in row: \n";
                //var_dump($board[$x]);
                return false;
            }

            $column = [];
            for($y=0; $y < 9; $y++){
                $column[] = $board[$y][$x];
            }
            $dupFound = $this->findDup($column); //check row
            if($dupFound){
                //echo "dupe found in column: \n";
                //var_dump($column);
                return false; // dupFound = invalid board -> false;
            }
            
            $dia1[] = $board[$x][$x];
            $dia2[] = $board[$x][8-$x];
        }
        
        $dupFound = $this->findDup($dia1);
        echo "dia1: \n";
        var_dump($dia1);
        if($dupFound){
            echo "dupe found in dia1: \n";
            var_dump($dia1);
            return false; // dupFound = invalid board -> false;
        }

        echo "dia2: \n";
        var_dump($dia2);
        $dupFound = $this->findDup($dia2);
        if($dupFound){
            echo "dupe found in dia2: \n";
            var_dump($dia2);
            return false; // dupFound = invalid board -> false;
        }

        for($x=0; $x < 3; $x++){
            $square = [];
            for($y=0; $y < 3; $y++){
                $square = array_merge($square, array_slice($board[$y+($x*3)], $x*3, 3));
            }
            var_dump($square);
            $dupFound = $this->findDup($square);
            if($dupFound){
                echo "dupe found in square: \n";
                var_dump($square);
                return false; // dupFound = invalid board -> false;
            }
        }


        return (!$dupFound);
    }

    function findDup($array){
        $counter = [];
        foreach($array as $key => $element){
            //var_dump($element);
            if($element != "."){
                if(!array_key_exists($element, $counter)){
                    $counter[$element] = 1; 
                }else{
                    return true;
                }
            }
        }
        return false;
    }

}

?>

</body>
</html>