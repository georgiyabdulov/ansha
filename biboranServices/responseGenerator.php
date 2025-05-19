<?php 
function generateResponseData(array $sentences, string $userInput): array {
   
    $errorMessage = '';
    $matchingSentences = [];
    $randomSentence = '';

    if (!empty($sentences)) {
        $randomSentence = $sentences[array_rand($sentences)];
        $userInputByWords = preg_split('/\s+/', mb_strtolower(trim($userInput), 'UTF-8'));
        
        $userInputByWords = array_filter($userInputByWords);

        if (!empty($userInputByWords)) {
            foreach ($sentences as $sentence) {
                foreach ($userInputByWords as $word) {
                    $lowerString = mb_strtolower($sentence, 'UTF-8');
                    if (strpos($lowerString, $word) !== false) {
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
  
