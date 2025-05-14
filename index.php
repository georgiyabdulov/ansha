
<?php

require 'vendor/autoload.php';

require 'biboranServices/pdfImporter.php';

require 'biboranServices/parser.php';

require 'biboranServices/responseGenerator.php';

$config = require 'biboranConfig/config.php';

use Smalot\PdfParser\Parser;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $text = convertPdfFilesToString($config['fileNames']);

    $sentences = parseBySentences($text);

    $userInput = $_POST['user_input'] ?? '';

    // response generator
//    $data = generateResponseData($sentences, $userInput);
}


if (file_exists($config['biboranViewFileName'])) {
    include $config['biboranViewFileName'];
}



?>
