<?php
/*
import pdf-file
decode pdf file
parse to substrings 14 words each separating by punctuation marks
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

// Split text into words
$words = preg_split('/\s+/', $text);
$substrings = [];

// Group into substrings of 14 words
for ($i = 0; $i < count($words); $i += 14) {
    $chunk = array_slice($words, $i, 14);
    if (count($chunk) === 14) {
        $substrings[] = implode(' ', $chunk);
    }
}

// Handle user input and show a random substring
$randomSubstring = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Example input (not used here, but collected)
    $userInput = $_POST['user_input'] ?? '';
    
    if (!empty($substrings)&&!empty($userInput)) {
        $randomSubstring = $substrings[array_rand($substrings)];
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
