<?php session_start(); ?>
<html>
<head>
   	<title>головна</title>
   	<meta charset=utf-8>
</head>

<body>
<h2>головна сторінка</h2>
<form action="ssreg.php" method="POST"> 
	<p> <label>Your login<br></label><input name="login" type="text" size="15" maxlength="30"></p>
    <p><label>Password<br></label><input name="password" type="password" size="15" maxlength="30"></p>
    <p><input type="submit" name="submit" value="Увійти"></p>
<!-- дані юзерів надсилаємо в ssreg.php-->
<br>
	<p><a href="registration.php">Зареєструватись</a></p> 
</form>
<?php
if (empty($_SESSION['login']) or empty($_SESSION['id'])){
	echo "Привіт гість";
	// якщо змінні порожні 
}
else{
	echo "Вітаю Вас ".$_SESSION['login'];
}
?>

    </body>
    </html>