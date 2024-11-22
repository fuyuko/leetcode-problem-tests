<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/insert-delete-getrandom-o1/
Lesson learned: 
- Runtime 63ms beats 32.14%, Memory 56.84mb beats 41.18%
-
*/

class RandomizedSet {
    private $map;
    /**
     */
    function __construct() {
        $map = array();
    }
  
    /**
     * @param Integer $val
     * @return Boolean
     */
    function insert($val) {
        if(!isset($this->$map[$val])){
            $this->$map[$val] = $val;
            return true;
        }
        return false;
    }
  
    /**
     * @param Integer $val
     * @return Boolean
     */
    function remove($val) {
        if(isset($this->$map[$val])){
            unset($this->$map[$val]);
            return true;
        }
        return false;
    }
  
    /**
     * @return Integer
     */
    function getRandom() {
        return array_rand($this->$map,1);
    }
}

/**
 * Your RandomizedSet object will be instantiated and called as such:
 * $obj = RandomizedSet();
 * $ret_1 = $obj->insert($val);
 * $ret_2 = $obj->remove($val);
 * $ret_3 = $obj->getRandom();
 */

?>

</body>
</html>