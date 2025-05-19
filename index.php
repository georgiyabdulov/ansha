
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

    // @todo: expand to a separate module
    // e.g. In the module the user input should be validated for further calculations 
    $userInput = $_POST['user_input'] ?? '';

    // response data generator
    $data = generateResponseData($sentences, $userInput);
}


if (file_exists($config['biboranViewFileName'])) {
    include $config['biboranViewFileName'];
}



?>
