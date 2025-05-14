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
$pdf = $parser->parseFile('biboran.pdf');
$text = $pdf->getText();

// Split into sentences
$sentences = preg_split('/(?<=[.?!])\s+/', $text);
$sentences = array_map('trim', $sentences);
$sentences = array_filter($sentences);
$sentences = array_values($sentences);

// Extract sentences with exactly 14 words
$sentence14 = [];
foreach ($sentences as $sentence) {
    if (str_word_count($sentence) === 14) {
        $sentence14[] = $sentence;
    }
}

$matchingSentences = [];
$randomSubstring = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userInput = $_POST['user_input'] ?? '';
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
        $elementCount() = 3 || $elementCount() = 4
        echo "Абдуль уже говорил так " . $elementCount . ' раза';
        else
        echo "Абдуль уже говорил так " . $elementCount . ' раз';
    if (!empty($sentence14) && !empty($userInput)) {
        $randomSubstring = $sentence14[array_rand($sentence14)];
    } else {
        $randomSubstring = 'Ошибка, маслёнок, неправильно дан запрос или нет предложения в 14 слов.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDF Sentence Matcher</title>
</head>
<body>
    <h2>Маслёнок, попизди</h2>
    <form method="POST">
        <input type="text" name="user_input" required>
        <button type="submit">Поиск</button>
    </form>

    <?php if (!empty($matchingSentences)): ?>
        <h3>Так говорил Абдуль:</h3>
        <ul>
            <?php foreach ($matchingSentences as $match): ?>
                <li><?= htmlspecialchars($match) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>❌ Совпадений не найдено.</p>
    <?php endif; ?>

    <h3>Случайное предложение из 14 слов:</h3>
    <p><strong><?= htmlspecialchars($randomSubstring) ?></strong></p>
</body>
</html>
