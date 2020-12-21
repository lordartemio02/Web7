<?php

	header('Content-type: text/html; charset=UTF-8');
 
	session_start();
 
	if (isset($_POST['style1']) || isset($_POST['style2']) || isset($_POST['style3'])) {
		if (isset($_POST['style1'])) {
			setcookie("style", "style1", time() + 3600);
		}
 
		if (isset($_POST['style2'])) {
			setcookie("style", "style2", time() + 3600);
		}
 
		if (isset($_POST['style3'])) {
			setcookie("style", "style3", time() + 3600);
		}
 
		header('Location: ./index.php');
	};
 
?>
 
<form action="settings.php" method="post">
	<input type="submit" name="style1" value="Зеленый цвет"> <br>
	<input type="submit" name="style2" value="Красный цвет"> <br>
	<input type="submit" name="style3" value="Стиль 3">
</form> 