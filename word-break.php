<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/word-break/
Lesson learned: 
- I struggled with this problem for long time
- The only thing I needed to do was the matchings at the beginning of the string to store as the index of the array not as value
*/

/* test case

"leetcode"
["leet","code"]
"applepenapple"
["apple","pen"]
"catsandog"
["cats","dog","sand","and","cat"]
"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabaabaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
["aa","aaa","aaaa","aaaaa","aaaaaa","aaaaaaa","aaaaaaaa","aaaaaaaaa","aaaaaaaaaa","ba"]
"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
["a","aa","aaa","aaaa","aaaaa","aaaaaa","aaaaaaa","aaaaaaaa","aaaaaaaaa","aaaaaaaaaa"]
"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab"
["a","aa","aaa","aaaa","aaaaa","aaaaaa","aaaaaaa","aaaaaaaa","aaaaaaaaa","aaaaaaaaaa"]
"fohhemkkaecojceoaejkkoedkofhmohkcjmkggcmnami"
["kfomka","hecagbngambii","anobmnikj","c","nnkmfelneemfgcl","ah","bgomgohl","lcbjbg","ebjfoiddndih","hjknoamjbfhckb","eioldlijmmla","nbekmcnakif","fgahmihodolmhbi","gnjfe","hk","b","jbfgm","ecojceoaejkkoed","cemodhmbcmgl","j","gdcnjj","kolaijoicbc","liibjjcini","lmbenj","eklingemgdjncaa","m","hkh","fblb","fk","nnfkfanaga","eldjml","iejn","gbmjfdooeeko","jafogijka","ngnfggojmhclkjd","bfagnfclg","imkeobcdidiifbm","ogeo","gicjog","cjnibenelm","ogoloc","edciifkaff","kbeeg","nebn","jdd","aeojhclmdn","dilbhl","dkk","bgmck","ohgkefkadonafg","labem","fheoglj","gkcanacfjfhogjc","eglkcddd","lelelihakeh","hhjijfiodfi","enehbibnhfjd","gkm","ggj","ag","hhhjogk","lllicdhihn","goakjjnk","lhbn","fhheedadamlnedh","bin","cl","ggjljjjf","fdcdaobhlhgj","nijlf","i","gaemagobjfc","dg","g","jhlelodgeekj","hcimohlni","fdoiohikhacgb","k","doiaigclm","bdfaoncbhfkdbjd","f","jaikbciac","cjgadmfoodmba","molokllh","gfkngeebnggo","lahd","n","ehfngoc","lejfcee","kofhmoh","cgda","de","kljnicikjeh","edomdbibhif","jehdkgmmofihdi","hifcjkloebel","gcghgbemjege","kobhhefbbb","aaikgaolhllhlm","akg","kmmikgkhnn","dnamfhaf","mjhj","ifadcgmgjaa","acnjehgkflgkd","bjj","maihjn","ojakklhl","ign","jhd","kndkhbebgh","amljjfeahcdlfdg","fnboolobch","gcclgcoaojc","kfokbbkllmcd","fec","dljma","noa","cfjie","fohhemkka","bfaldajf","nbk","kmbnjoalnhki","ccieabbnlhbjmj","nmacelialookal","hdlefnbmgklo","bfbblofk","doohocnadd","klmed","e","hkkcmbljlojkghm","jjiadlgf","ogadjhambjikce","bglghjndlk","gackokkbhj","oofohdogb","leiolllnjj","edekdnibja","gjhglilocif","ccfnfjalchc","gl","ihee","cfgccdmecem","mdmcdgjelhgk","laboglchdhbk","ajmiim","cebhalkngloae","hgohednmkahdi","ddiecjnkmgbbei","ajaengmcdlbk","kgg","ndchkjdn","heklaamafiomea","ehg","imelcifnhkae","hcgadilb","elndjcodnhcc","nkjd","gjnfkogkjeobo","eolega","lm","jddfkfbbbhia","cddmfeckheeo","bfnmaalmjdb","fbcg","ko","mojfj","kk","bbljjnnikdhg","l","calbc","mkekn","ejlhdk","hkebdiebecf","emhelbbda","mlba","ckjmih","odfacclfl","lgfjjbgookmnoe","begnkogf","gakojeblk","bfflcmdko","cfdclljcg","ho","fo","acmi","oemknmffgcio","mlkhk","kfhkndmdojhidg","ckfcibmnikn","dgoecamdliaeeoa","ocealkbbec","kbmmihb","ncikad","hi","nccjbnldneijc","hgiccigeehmdl","dlfmjhmioa","kmff","gfhkd","okiamg","ekdbamm","fc","neg","cfmo","ccgahikbbl","khhoc","elbg","cbghbacjbfm","jkagbmfgemjfg","ijceidhhajmja","imibemhdg","ja","idkfd","ndogdkjjkf","fhic","ooajkki","fdnjhh","ba","jdlnidngkfffbmi","jddjfnnjoidcnm","kghljjikbacd","idllbbn","d","mgkajbnjedeiee","fbllleanknmoomb","lom","kofjmmjm","mcdlbglonin","gcnboanh","fggii","fdkbmic","bbiln","cdjcjhonjgiagkb","kooenbeoongcle","cecnlfbaanckdkj","fejlmog","fanekdneoaammb","maojbcegdamn","bcmanmjdeabdo","amloj","adgoej","jh","fhf","cogdljlgek","o","joeiajlioggj","oncal","lbgg","elainnbffk","hbdi","femcanllndoh","ke","hmib","nagfahhljh","ibifdlfeechcbal","knec","oegfcghlgalcnno","abiefmjldmln","mlfglgni","jkofhjeb","ifjbneblfldjel","nahhcimkjhjgb","cdgkbn","nnklfbeecgedie","gmllmjbodhgllc","hogollongjo","fmoinacebll","fkngbganmh","jgdblmhlmfij","fkkdjknahamcfb","aieakdokibj","hddlcdiailhd","iajhmg","jenocgo","embdib","dghbmljjogka","bahcggjgmlf","fb","jldkcfom","mfi","kdkke","odhbl","jin","kcjmkggcmnami","kofig","bid","ohnohi","fcbojdgoaoa","dj","ifkbmbod","dhdedohlghk","nmkeakohicfdjf","ahbifnnoaldgbj","egldeibiinoac","iehfhjjjmil","bmeimi","ombngooicknel","lfdkngobmik","ifjcjkfnmgjcnmi","fmf","aoeaa","an","ffgddcjblehhggo","hijfdcchdilcl","hacbaamkhblnkk","najefebghcbkjfl","hcnnlogjfmmjcma","njgcogemlnohl","ihejh","ej","ofn","ggcklj","omah","hg","obk","giig","cklna","lihaiollfnem","ionlnlhjckf","cfdlijnmgjoebl","dloehimen","acggkacahfhkdne","iecd","gn","odgbnalk","ahfhcd","dghlag","bchfe","dldblmnbifnmlo","cffhbijal","dbddifnojfibha","mhh","cjjol","fed","bhcnf","ciiibbedklnnk","ikniooicmm","ejf","ammeennkcdgbjco","jmhmd","cek","bjbhcmda","kfjmhbf","chjmmnea","ifccifn","naedmco","iohchafbega","kjejfhbco","anlhhhhg"]
"catscatdog"
["cat","cats","dog"]

*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     * 
     * Runtime 2ms beats 83.33%, Memory 19.96mb beats 73.53%
     */
    function wordBreak($s, $wordDict) {

/*
        //clean up dictionary was not needed

        foreach($wordDict as $i => $needle){
            //1. remove words doesn't match at all
            if(!str_contains($s, $needle)) unset($wordDict[$i]);
            //2. remove self-repeat words
            foreach($wordDict as $j => $haystack){
                if(($haystack != null) && ($needle != null) && (strcmp($needle, $haystack) != 0)) {
                    
                    if(str_replace($needle, "", $haystack) === ""){
                        unset($wordDict[$j]);
                    }
                }
            }
        }
        reset($wordDict);
        
        //3 can dictionary word can be represented by other dictionary words
        $this->sortByStrlenAsc($wordDict);
        for($i= count($wordDict)-1; $i > 1; $i--){
            $result = $this->findSolution($wordDict[$i], array_slice($wordDict, 0, $i));
            if($result === true){
                unset($wordDict[$i]);
            }
        }
        reset($wordDict);

*/
        
        $starts = array();  

        foreach($wordDict as $word){
            if(strcmp($s, $word) === 0){
                return true;
            } 
            if(str_starts_with($s, $word)){
                $starts[$word] = 1;
            }
        }
        if(count($starts) === 0){
            return false;
        }

        while(count($starts) !== 0){

            foreach($starts as $pre => $i){
                foreach($wordDict as $word){
                    if(str_starts_with($s, $pre . $word)){
                        if(strlen($pre . $word) === strlen($s)) return true; //found a solution
                        $starts[$pre . $word] = 1;
                    }
                }
                unset($starts[$pre]);
            }
            reset($starts);
        }

        return false;      
    }

    //didn't need to check from end
    function findSolution(&$s, &$wordDict){

        $starts = array();  
        $ends = array();

        foreach($wordDict as $word){
            if(strcmp($s, $word) === 0){
                return true;
            } 
            if(str_starts_with($s, $word)){
                $starts[$word] = 1;
            }
            if(str_ends_with($s, $word)){
                $ends[$word] = 1;
            }
        }
        if((count($starts) === 0) || (count($ends) === 0)){
            return false;
        }

        while((count($starts) !== 0) || (count($ends) !== 0)){

            foreach($starts as $pre => $i){
                foreach($wordDict as $word){
                    if(str_starts_with($s, $pre . $word)){
                        if(strlen($pre . $word) === strlen($s)) return true; //found a solution
                        $starts[$pre . $word] = 1;
                    }
                }
                unset($starts[$pre]);
            }
            reset($starts);
            
            foreach($ends as $post => $i){
                foreach($wordDict as $word){
                    if(str_ends_with($s, $word . $post)){
                        if(strlen($word . $post) === strlen($s)) return true; //found a solution
                        $ends[$word . $post] = 1;
                    }
                }
                unset($ends[$post]);
            }
            reset($ends);
            if((count($starts) === 0) || (count($ends) === 0)){
                return false;
            }
        }

        return false;        
    }

    //didn't need it
    function sortByStrlenAsc(&$array){
        usort($array, function($a, $b) {
            return strlen($a) - strlen($b);
        });
    }


}

?>

</body>
</html>