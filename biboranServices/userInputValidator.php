<?php
    function userInputValidator(string $userInput): string {
        if ($userInput == '' || strlen(trim ($userInput))==0) {
            return false;
        }
        if (preg_match('/[[:punct:]]/', $userInput)) {
            $userInputNoPunctuation = preg_replace('/[[:punct:]]/', '', $userInput);
            return $userInputNoPunctuation;
        }
        return $userInput;
    }

?>