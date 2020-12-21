<?php
	function power($val, $pow)
	{
		if ($val == 0)
		return 0;
		elseif ($pow == 0)
		return 1;
		elseif ($pow < 0)
		return power(1/$val, -$pow);
		else
		return $val *  power($val, $pow-1);
	}
	echo power(6, 2);
    echo("<br>");
    echo ('<hr>')
?>
<?php
$today[1] = date("H");
$today[2] = date("i"); 
function sklon($num,$period){
	$numret = $num;
	$hour = array("час","часа","часов");
	$min = array("минуту","минуты","минут");
	if ($period=='hour') $titles = $hour;
	if ($period=='min') $titles = $min;
	$cases = array (2, 0, 1, 1, 1, 2);
	return $numret." ".$titles[ ($num%100>4 && $num%100<20)? 2 : $cases[min($num%10, 5)] ];
}
$hours = sklon($today[1], "hour");
$mins = sklon($today[2], "min");
echo("Текущее время: $hours $mins .");
echo("<br>");
echo ('<hr>')
?>
<?php
	$number = 1;
	while ($number < 100) {
		if ($number % 3 == 0) {
			echo $number++ . ' ';
		}
		$number++;
	}
	
	echo '<hr>';
	echo("<br>")
?>
<?php
$number = 0;
do {
    if ($number == 0) {
        echo $number . ' – это ноль.' . '<br>';
        $number++;
    } elseif ($number % 2 != 0) {
        echo $number . ' – нечетное число.' . '<br>';
        $number++;
    } else {
        echo $number . ' – четное число.' . '<br>';
        $number++;
    }
} while ($number < 11);

echo '<hr>';
echo("<br>")
?>
<?php
for ($i = 0; $i < 10; print $i++ . ' ') {
};

echo '<hr>';
echo("<br>")
?>
<?php
$areaArr = [
    'Московская область:' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область:' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Волгоградская область:' => ['Волгоград', 'Волжский', 'Камышин', 'Урюпинск', 'Иловля']
];

function displayCity($arr)
{
    if (!is_array($arr)) {
        return print "incorrect argument '{$arr}'";
    }
    foreach ($arr as $key => $value) {
        echo $key . '<br>';
        for ($i = 0; $i < $arrLength = count($arr[$key]); $i++) {
            //находим последний элемент вложенного массива для переноса строки
            if ($i == $arrLength - 1) {
                echo $arr[$key][$i] . '.' . '<br>';
            } else {
                //если не последний, ставим запятую
                echo $arr[$key][$i] . ', ';
            }
        }
    }
}

displayCity($areaArr);

echo '<hr>';
echo("<br>")
?>
<?php
function searchCity($char, $arr)
{
    if (!is_array($arr) || !is_string($char)) {
        return print 'incorrect arguments.';
    }
    //счетчик неподходящих городов.
    $wrongCity = 0;
    //количество городов в массиве
    $cityCount = count($arr, COUNT_RECURSIVE) - count($arr);
    foreach ($arr as $key => $value) {
        for ($i = 0; $i < count($arr[$key]); $i++) {
            //для работы с кириллицей
            $explodeArr = preg_split('//u', $arr[$key][$i], 0, PREG_SPLIT_NO_EMPTY);
            //если первая буква совпадает с искомой, то выводим на экран
            if ($explodeArr[0] == $char) {
                echo implode($explodeArr) . '<br>';
            } else {
                $wrongCity++;
                // если счетчик неподходящих городов == количество городов в массиве, то выводим сообщение
                if ($wrongCity == $cityCount) {
                    return print "Города на букву '{$char}' в массиве нет.";
                }
            }
        }
    }
}

searchCity('К', $areaArr);

echo '<hr>';
echo("<br>")
?>
<?php
function translit($string)
{
    if (!is_string($string)) {
        return 'incorrect argument';
    }

    $ruChars = 'А	Б	В	Г	Д	Е	Ё	Ж	З	И	Й	К	Л	М	Н	О	П	Р	С	Т	У	Ф	Х	Ц	Ч	Ш	Щ	Ъ	Ы	Ь	Э	Ю	Я';
    $enChars = 'A	B	V	G	D	E	E	ZH	Z	I	Y	K	L	M	N	O	P	R	S	T	U	F	KH	TS	CH	SH	SCH	’ 	Y	’ 	E	YU	YA';

    //совмещенный массив
    $tranArr = array_combine(explode('	', mb_strtolower($ruChars)), explode('	', strtolower($enChars)));
    //преобразуем аргумент (строку) в массив
    $stringArr = preg_split('//u', mb_strtolower($string), 0, PREG_SPLIT_NO_EMPTY);

    $requestedArr = [];

    //перебираем строку и для каждой буквы ищем совпадение в массиве транслита
    for ($i = 0; $i < count($stringArr); $i++) {
        foreach ($tranArr as $key => $value) {
            //если находим, добавляем в новый массив
            if ($stringArr[$i] == $key) {
                array_push($requestedArr, $value);
                break;
                //если встречаются знаки пунктуации или пробелы, добавляем без обработки
            } elseif (preg_match('/[[:punct:]]|\s/', $stringArr[$i])) {
                array_push($requestedArr, $stringArr[$i]);
                break;
            }
        }
    }

    //выводим на экран
    return implode($requestedArr);
}

echo translit('Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания');

echo '<hr>';
echo("<br>")
?>
<?php
function translitReplaceSpaces($string)
{
    if (!is_string($string)) {
        return 'incorrect argument';
    }

    $ruChars = 'А	Б	В	Г	Д	Е	Ё	Ж	З	И	Й	К	Л	М	Н	О	П	Р	С	Т	У	Ф	Х	Ц	Ч	Ш	Щ	Ъ	Ы	Ь	Э	Ю	Я';
    $enChars = 'A	B	V	G	D	E	E	ZH	Z	I	Y	K	L	M	N	O	P	R	S	T	U	F	KH	TS	CH	SH	SCH	’	Y	’	E	YU	YA';

    //совмещенный массив
    $tranArr = array_combine(explode('	', mb_strtolower($ruChars)), explode('	', strtolower($enChars)));
    //преобразуем аргумент (строку) в массив
    $stringArr = preg_split('//u', mb_strtolower($string), 0, PREG_SPLIT_NO_EMPTY);

    //перебираем строку и для каждой буквы ищем совпадение в массиве транслита
    for ($i = 0; $i < count($stringArr); $i++) {
        foreach ($tranArr as $key => $value) {
            //если находим, добавляем в новый массив
            if ($stringArr[$i] == $key) {
                $requestedArr[] = $value;
                break;
                //если встречаются знаки пунктуации или пробелы, добавляем без обработки
            } elseif (preg_match('/[[:punct:]]|\s/', $stringArr[$i])) {
                $requestedArr[] = $stringArr[$i];
                break;
            }
        }
    }

    //выводим на экран
    return preg_replace('/\s/', '_', implode($requestedArr));
}

echo translitReplaceSpaces('Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания');
echo ('<hr>');
echo("<br>")

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
 
	<form action="" method="post">
		<input type="text" name="a" value="<?php print (isset($_POST['a']) ? $_POST['a'] : ''); ?>">
		<input type="text" name="b" value="<?php print (isset($_POST['b']) ? $_POST['b'] : ''); ?>"> 
		<?php
 
		/* 3. Создайте калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку. Данные, введённые пользователем в поля, должны сохраняться и выводиться вместе с результатом вычисления. */
 
		$arg1 = $_POST['a'];
		$arg2 = $_POST['b'];
 
		if (isset($_POST['+'])) {
			$res = $arg1 + $arg2;
			echo "<b>= $res</b>";
		} elseif (isset($_POST['-'])) {
				$res = $arg1 - $arg2;
				echo "<b>= $res</b>";
		} elseif (isset($_POST['*'])) {
				$res = $arg1 * $arg2;
				echo "<b>= $res</b>";
		} elseif (isset($_POST['/'])) {
				$res = $arg1 / $arg2;
				echo "<b>= $res</b>";
		};
 
		?>
 
		<br>
		<input type="submit" value="+" name="+">
		<input type="submit" value="-" name="-">
		<input type="submit" value="*" name="*">
		<input type="submit" value="/" name="/">
	</form>
 
</body>
</html>
