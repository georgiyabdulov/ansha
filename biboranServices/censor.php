<?php
    
    function censor(string $string, array $bannedWords): string {
        foreach ($bannedWords as $word)  {
                $lengthOfBannedWord = strlen($word);
                $symbol = '*';
                $symbols = str_repeat($symbol, $lengthOfBannedWord);
            if (strpos($string, $word) !== false) {
                $string = str_replace($word, $symbols, $string);    
            }    
        }
        return $string;
    }

?>