<!DOCTYPE html>
<html>
<body>

<?php

/*
Lesson learned: 
- Check the comments and parameters in the code before starting to code. TreeNode instead of an array.
- Learned how to access class variables: its $classInstance->variable (not $classInstance->$variable ...no dollar sign)
*/

$root;

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
     */

    function maxDepth($root) {
        $maxDepth = 0; 
        $rightDepth = 0;
        $leftDepth = 0; 

        if($root != null){
                $maxDepth++;
            if($root->right != null){
                $rightDepth = $this->maxDepth($root->right);
            }
            if($root->left != null){
                $leftDepth = $this->maxDepth($root->left);
            }
            $maxDepth += max($rightDepth, $leftDepth);
        }

        return $maxDepth;
    }
}

/* incorrect solution - thought it was array problem, not TreeNode class problem */
class SolutionTreeArray { 

    /**
     * @param TreeNode $root
     * @return Integer
     */

    function maxDepth($root) {
        $maxDepth = 0;  
        $length = count($root);
        $children = 0;

        if($root[0] != null){
            $maxDepth = 1;
            $children = 2;
            for($x = 1; $x < $length; $x = $x+$children){
                    $grandchildren = 0;
                for($y = 0; $y < $children; $y++){
                    if($root[$x+$y] != null){
                        $grandchildren += 2;
                    }
                }
                if($grandchildren > 0) $maxDepth++;
                $children = $grandchildren;
            }
        }
        return $maxDepth;
    }
}

?>

</body>
</html>