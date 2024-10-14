<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/sum-root-to-leaf-numbers/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     * 
     * Runtime 0ms beats 100%, Memory 10.97mb beats 41.18%
     */
    function sumNumbers($root) {
        if(($root->left === null) && ($root->right === null)){
             return $root->val;
        }

        $result = array();

        if ($root->left !== null){
            $left = $this->constructNum($root->left);
            foreach($left as $num){
                $result[] = strval($root->val) . $num;
            }
        }

        if ($root->right !== null){
            $right = $this->constructNum($root->right);
            foreach($right as $num){
                $result[] = strval($root->val) . $num;
            }
        }         
        
        
        $resultNum = 0;

        foreach($result as $num){
            $resultNum += intval($num);
        }

        return $resultNum;
    }

    function constructNum(&$root){

        if(($root->left === null) && ($root->right === null)){
             return array(strval($root->val));
        }

        $result = array();

        if ($root->left !== null){
            $left = $this->constructNum($root->left);
            foreach($left as $num){
                $result[] = strval($root->val) . $num;
            }
        }

        if ($root->right !== null){
            $right = $this->constructNum($root->right);
            foreach($right as $num){
                $result[] = strval($root->val) . $num;
            }
        }         
        return $result;
    }
}

?>

</body>
</html>