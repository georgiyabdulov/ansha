<?php
    
    function censor(string $string, array $bannedWords): string {
        foreach ($bannedWords as $word)  {
            if (strpos($string, $word) !== false) {
                $string = str_replace($word, '', $string);
            }    
        }
        return $string;
       
    }

?>