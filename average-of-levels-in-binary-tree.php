<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/average-of-levels-in-binary-tree/
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
     * @return Float[]
     *
     * Constraints:
     * The number of nodes in the tree is in the range [1, 10^4].
     * -2^31 <= Node.val <= 2^31 - 1
     * 
     * Runtime 16 ms beats 68.75%, Memory 22.06mb beats 34.38%
     */
    function averageOfLevels($root) {
        $avg = null;

        if($root->left !== null){
            $avg[1][] = $root->left->val;
            $this->nextLevel($root->left, $avg, 2);

        }if($root->right !== null){
            $avg[1][] = $root->right->val;
            $this->nextLevel($root->right, $avg, 2);
        }

        $result[] = $root->val;

        if($avg !== null){
            for($i = 1; $i <= count($avg); $i++){
                $result[$i] = array_sum($avg[$i])/count($avg[$i]);
            }
        }
        //var_dump($avg);
        return $result;

    }

    function nextLevel(&$root, &$avg, $nextLevel){
        if($root->left !== null){
            //echo "entered left \n";
            $avg[$nextLevel][] = $root->left->val;
            $this->nextLevel($root->left, $avg, $nextLevel+1);

        }if($root->right !== null){
            //echo "entered right \n";
            $avg[$nextLevel][] = $root->right->val;
            $this->nextLevel($root->right, $avg, $nextLevel+1);
        }
    }
}

?>

</body>
</html>