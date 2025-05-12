<?php
	$number = 1;
	$number2 = 4;
	$number3 = 8;
	$number4 = 8;
echo $number + $number2 + $number;
echo $number3 + $number;
// if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
// 		$uri = 'https://';
// 	} else {
// 		$uri = 'http://';
// 	}
// 	$uri .= $_SERVER['HTTP_HOST'];
// 	header('Location: '.$uri.'/dashboard/');
// 	exit;
?>
<form method="post">
    <label>Число 1: <input type="number" name="num1" required></label><br><br>
    <label>Число 2: <input type="number" name="num2" required></label><br><br>
	<label>Число 3: <input type="number" name="num3" required></label><br><br>
    <button type="submit">Результат</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = $_POST['num1'] ?? 0;
    $b = $_POST['num2'] ?? 0;
	$c = $_POST['num3'] ?? 0;

    // Проверка, что введены числа
    if (is_numeric($a) && is_numeric($b)) {
        $sum = $a * $b + $c;
        echo "<p>Сумма: <strong>$sum</strong></p>";
		if ($sum%2 == 0)
		{echo "сумма чётная \n";}
	else 
	{echo "сумма нечётная \n";}
	if ($sum <1488 || $sum>1488)
	{echo "непосхалко";}
	else 
	{echo "посхалко";}
    } else {
        echo "<p style='color: red;'>Введите корректные числа</p>";
	}
	echo "1" . "2";
	echo "\n\r";
$array = [1,2,3,5,6,7,8];
echo $array[1] + $array[2];
echo "\n\r";
$array2 = ["one" => 1, "two" => 2];
echo $array2["one"] + $array2["two"];
}
?>