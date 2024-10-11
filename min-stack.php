<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/min-stack/
Lesson learned: 
- 
-
*/

// Runtime 333 ms beats 7.60%, Memory 23.50MB beats 91.14%
class MinStack {

    private $stack = array();

    /**
     */
    function __construct() {
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) {
        if($this->stack === null){
            $this->stack[] = $val;
        }else{
             array_unshift($this->stack, $val);
        }
       
    }
  
    /**
     * @return NULL
     */
    function pop() {
        if($this->stack === null) return null;
        array_shift($this->stack);
    }
  
    /**
     * @return Integer
     */
    function top() {
        if(count($this->stack) < 1) return null;
        return $this->stack[0];
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        if(count($this->stack) < 1) return null;
        return min($this->stack);
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */

?>

</body>
</html>