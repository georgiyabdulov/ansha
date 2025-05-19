
<?php

require 'vendor/autoload.php';

require 'biboranServices/pdfImporter.php';

require 'biboranServices/parser.php';

require 'biboranServices/responseGenerator.php';

$config = require 'biboranConfig/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $text = convertPdfFilesToString($config['fileNames']);

    $sentences = parseBySentences($text);

    $matchingSentences = [];
    $randomSentence = '';


    $userInput = $_POST['user_input'] ?? '';

    // response generator
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

    //считаю количество предложений, пробую без гпт//
    $elementCount = count($matchingSentences);
    if ($elementCount == 3 || $elementCount == 4 || $elementCount == 2){
        echo "Абдуль уже говорил так " . $elementCount . ' раза';
    } else {
        echo "Абдуль уже говорил так " . $elementCount . ' раз';
    }


    if (isset($sentences['error']) || empty($userInput)) {
        $randomSentence = $sentences['error'];
    }
}


if (file_exists($config['biboranViewFileName'])) {
    include $config['biboranViewFileName'];
}



?>
