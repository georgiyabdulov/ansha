<?php 

require 'vendor/autoload.php';


use Smalot\PdfParser\Parser;

function convertPdfFilesToString(array $fileNames):string {
    $parser = new Parser();

    $text = '';
    foreach ($fileNames as $fileName) {
        $pdf = $parser->parseFile('sources/' . $fileName);
        $text .= $pdf->getText();
    }
    return $text;
}






?>