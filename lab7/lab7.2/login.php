<?php
 
 header('Content-Type: text/html; charset=utf-8');

 if (isset($_POST['username'])) {
	 session_start();
	 $_SESSION['username'] = $_POST['username'];
	 if (isset($_POST['remember'])) {
		 setcookie("username", $_POST['username'], time() + 3600 * 24 * 7);
	 };

	 header('Location: /index.php');
 };
?>

 <h1>Авторизация</h1>

 <form action="login.php" method="post" enctype="multipart/form-data">
	 Имя пользователя: <input type="text" name="username" placeholder="Введите Имя"> <br>
	 <input type="checkbox" name="remember" value="1"> Запомнить меня <br>
	 <input type="submit" value="Войти">
 </form>