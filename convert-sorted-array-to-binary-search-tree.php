<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/convert-sorted-array-to-binary-search-tree/
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
     * @param Integer[] $nums
     * @return TreeNode
     * 
     * Runtime 1ms beats 100%, Memory 21.56mb beats 13.21%
     */
    function sortedArrayToBST($nums) {
        $length = count($nums);
        if($length === 1)  return new TreeNode($nums[0]);

        $half = intdiv($length, 2) + $length%2;
        $result = new TreeNode($nums[$half-1]);
        //var_dump($half);
        //var_dump($result);
        if($half-1 > 0){
            //var_dump(array_slice($nums, 0, $half-1));
            $result->left = $this->sortedArrayToBST(array_slice($nums, 0, $half-1));
        }
        if($half < $length){
            //var_dump(array_slice($nums, $half));
            $result->right = $this->sortedArrayToBST(array_slice($nums, $half));
        }
        
        return $result;
        
    }

}

?>

</body>
</html>