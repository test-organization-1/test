<?php
// дані з index.php
session_start();
if (isset($_POST['login'])){ 
	$login = $_POST['login']; 
	if ($login == ''){ 
		unset($login);// якщо  $login порожній то видаляємо 
	} 
} 
if (isset($_POST['password'])){ 
	$password=$_POST['password']; 
	if ($password ==''){ // якщо  $password порожній то видаляємо 
		unset($password);
	} 
}
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
if (empty($login) or empty($password))
    exit ("<h3>Заповніть всі поля</h3><br>". "<a href='index.php'>повернутись на головну</a>");
if( $login != trim($login))
	exit("Введіть логін без пробілів!!!" . "<br><a href='registration.php'>назад</a>");
if( $password != trim($password))
	exit("Введіть пароль без пробілів!!!" . "<br><a href='registration.php'>назад</a>");
if( $phone != trim($phone))
	exit("Введіть номер мобільного без пробілів!!!" . "<br><a href='registration.php'>назад</a>");
// обрізаємо хтмл теги, скрипти, пробіли
include ("bd.php"); // підключаємо бд
$result = mysql_query("SELECT login, password FROM users WHERE login='$login'",$db); 
$myrow = mysql_fetch_array($result);
if (empty($myrow['login'])){
	exit ("<h1>Введений логін або пароль - неправильний</h1> <br>". "<a href='index.php'>повернутись на головну</a>");
    }
else {
    if ($myrow['password']==$password) {  //перевіряємо паролі
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    	$_SESSION['login']=$myrow['login']; 
    	$_SESSION['id']=$myrow['id'];//дані вішаємо на сесію
    	echo "<h3>Ви увійшли на наший сайт</h3><br><a href='index.php'>повернутись на головну</a>";
    }
 else {
    //если пароли не сошлись
	exit ("<h1>Введений логін або пароль - неправильний</h1> <br>". "<a href='index.php'>повернутись на головну</a>");
    }
}
?>



























