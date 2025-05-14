<?php 


function parseBySentences(string $text, int $count = 0):array {
    $sentences = [];


    $sentences = preg_split('/(?<=[.?!])\s+/', $text);
    $sentences = array_map('trim', $sentences);
    $sentences = array_filter($sentences);
    $sentences = array_values($sentences);

    if ($count > 0) {
        $sentencesOfLength = [];
        foreach ($sentences as $sentence) {
            if (str_word_count($sentence) === $count) {
                $sentencesOfLength[] = $sentence;
            }
        }
        if (empty($sentencesOfLength)) {
            return ['error' => 'Ошибка, маслёнок, неправильно дан запрос или нет предложения в 14 слов.'];
        } else {
            return $sentencesOfLength;
        }
    }

    return $sentences;
}


function parseByWordCount(string $text, int $count):array { 

    $words = preg_split('/\s+/', $text);
    $substrings = [];

    // Group into substrings of $count words
    for ($i = 0; $i < count($words); $i += $count) {
        $chunk = array_slice($words, $i, $count);
        if (count($chunk) === $count) {
            $substrings[] = implode(' ', $chunk);
        }
    }

    return $substrings;

}
