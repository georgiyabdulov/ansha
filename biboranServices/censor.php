<?php
function censor($text, $badWords) {
    foreach ($badWords as $word) {
        $pattern = '/' . preg_quote($word, '/') . '/iu'; // 'i' = case-insensitive, 'u' = UTF-8
        $text = preg_replace_callback($pattern, function($match) {
            return str_repeat('*', mb_strlen($match[0], 'UTF-8'));
        }, $text);
    }
    return $text;
}


?>