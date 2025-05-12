<?php
/*
import pdf-file
decode pdf file
parse to sentences 14 words each separating by punctuation marks
collect user input
output random substring
*/
?>
<?php
require 'vendor/autoload.php';

use Smalot\PdfParser\Parser;

// Load and parse the PDF
$parser = new Parser();
$pdf = $parser->parseFile('biboran.pdf'); // Replace with your PDF file path
$text = $pdf->getText();

// Split text into sentences using punctuation marks
$sentences = preg_split('/(?<=[.?!])\s+/', $text);

// Clean up whitespace
$sentences = array_map('trim', $sentences);

// Optional: Remove empty sentences
$sentences = array_filter($sentences);

// Convert to indexed array
$sentences = array_values($sentences);
$sentence14 = [];
foreach ($sentences as $sentence) {
    if (strlen($sentence) == 14){
        $sentence14[] = $sentence;
    }
    
    

}
// Handle user input and show a random substring
$randomSubstring = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Example input (not used here, but collected)
    $userInput = $_POST['user_input'] ?? '';
    
    if (!empty($sentence14)&&!empty($userInput)) {
        $randomSubstring = $sentence14[array_rand($sentence14)];
    } else { 
        $randomSubstring = 'ошибка, маслёнок, неправильно дан запрос или нет предложения в 14 слов';
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PDF Substring Extractor</title>
</head>
<body>
    <form method="POST">
        <label>Enter something:</label>
        <input type="text" name="user_input" required>
        <button type="submit">Get Random Substring</button>
    </form>

    <?php if (!empty($randomSubstring)): ?>
        <p><strong>Random 14-word substring:</strong> <?= htmlspecialchars($randomSubstring) ?></p>
    <?php endif; ?>
</body>
</html>
