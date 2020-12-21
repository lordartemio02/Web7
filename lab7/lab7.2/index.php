<?php 
  session_start();
  if (!isset($_SESSION['style']) && !isset($_COOKIE['style']) ) {
	  header('Location: ./settings.php');
  };

  if (!isset($_SESSION['style']) && isset($_COOKIE['style']) ) {
	  $_SESSION['style'] = $_COOKIE['style'];
  };

  $style = $_COOKIE['style'];

?>
<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	include_once('./auth.php');
	if (isset($_COOKIE['page'])) {
		header("Location: ./{$_COOKIE['page']}.php");
	}
	echo "Привет, " . $username;
?>
<?php 
	session_start();
	if (!isset($_SESSION['style']) && !isset($_COOKIE['style']) ) {
		header('Location: ./settings.php');
	};
 
	if (!isset($_SESSION['style']) && isset($_COOKIE['style']) ) {
		$_SESSION['style'] = $_COOKIE['style'];
	};
 
	$style = $_COOKIE['style'];
 
?>
	<h1>Первое задание</h1>

	<a href="./firsttask/task1-10.php">Задания 1-10</a><br>
	<a href="./firsttask/index.php">Загрузка файла</a><br>
	
	<h1>Второе задание</h1>
	<br>
	<a href="./settings.php">Настройки стилей</a>
	<a href="./a.php">Страница А</a><br>
	<a href="./b.php">Страница Б</a><br>
	<a href="./firsttask/index.php">Загрузка картинки</a><br>
	<h1>Третье задание</h1>
	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Главная</title>
</head>
<body>
	
	<h1>Главная</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt cumque nesciunt, esse officia. Quaerat alias harum, sed odit minus voluptate aliquam commodi possimus corporis accusantium delectus, provident esse reprehenderit impedit.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis sed quisquam facere voluptas voluptatibus ad saepe, quas tenetur maxime est ipsum asperiores doloribus corrupti, esse doloremque ducimus quae. Autem, deleniti.</p>
</body>
</html>