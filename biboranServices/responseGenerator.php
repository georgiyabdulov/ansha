<?php 
function GenerateResponse (string $randomSubstring, array $matchingSentences)
 $matchingSentences = [];
    $randomSubstring = '';
    $userInput = $_POST['user_input'] ?? '';
    $userWords = preg_split('/\s+/', strtolower(trim($userInput)));

    foreach ($sentences as $sentence) {
        $lowerSentence = strtolower($sentence);
        foreach ($userWords as $word) {
            if ($word && strpos($lowerSentence, $word) !== false) {
                $matchingSentences[] = $sentence;
                break;
            }
        }
    }
