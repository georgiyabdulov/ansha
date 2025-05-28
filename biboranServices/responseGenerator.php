<?php 
require 'censor.php';
function generateResponseData(array $sentences, string $userInput, array $bannedWords): array {
   //объявляются пременные//
    $errorMessage = '';
    $matchingSentences = [];
    $randomSentence = '';
    

    if (!empty($sentences)) {
        $randomSentence = $sentences[array_rand($sentences)];
        //превращает userInput в массив слов, разделяя строку с помощью регулярного выражения//
        $userInputByWords = preg_split('/\s+/', mb_strtolower(trim($userInput), 'UTF-8'));
        
        $userInputByWords = array_filter($userInputByWords);

        if (!empty($userInputByWords)) {
            foreach ($sentences as $sentence) {
                $lowerString = mb_strtolower($sentence, 'UTF-8');
                foreach ($userInputByWords as $word) {
                    if (strpos($lowerString, $word) !== false) {
                        $sentence = censor($sentence, $bannedWords);
                        $matchingSentences[] = $sentence;
                        break;
                    }
                }
            }
        } else {
            $errorMessage = '$userInput is Empty';
        }
    } else {
        $errorMessage = '$sentences is Empty';
    }

    return [
        'randomSentence' => $randomSentence,
        'matchingSentences' => $matchingSentences,
        'errorMessage' => $errorMessage
    ];
}
  
