
<?php
date_default_timezone_set('Asia/Aqtau');
echo date('Y-m-d H:i:s');


require 'vendor/autoload.php';

require 'biboranServices/pdfImporter.php';

require 'biboranServices/parser.php';

require 'biboranServices/responseGenerator.php';

require 'biboranServices/userInputValidator.php';

// require 'biboranServices/censor.php';

$config = require 'biboranConfig/config.php';

use Smalot\PdfParser\Parser;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $text = convertPdfFilesToString($config['fileNames']);

    $sentences = parseBySentences($text);

    // @todo: expand to a separate module
    // e.g. In the module the user input should be validated for further calculations 
    $userInput = userInputValidator($_POST['user_input']);
    $userInput = censor($_POST['user_input'], $config['bannedWords']);

    // response data generator
    $data = generateResponseData($sentences, $userInput, $config['bannedWords']);
}


if (file_exists($config['biboranViewFileName'])) {
    include $config['biboranViewFileName'];
}



?>
