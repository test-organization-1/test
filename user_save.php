<?php 
if( isset($_POST['login'])){ 
	$login = $_POST['login']; 
	if( $login == ''){ 
		unset($login);
	}
}  
if( isset($_POST['password'])){
	$password = $_POST['password'];
	if( $password == ''){
		unset($password);
	}
}
if( isset($_POST['phone'])){
	$phone = $_POST['phone'];
	if( $phone == ''){
		unset($phone);
	}
}
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$phone = stripslashes($phone);
$phone = htmlspecialchars($phone);
if( empty($login) or empty($password) or empty($phone))
	exit("заповніть всі поля" . "<br>" . "<a href='registration.php'>повернутись назад</a>");
if( $login != trim($login))
	exit("Введіть логін без пробілів!!!" . "<br><a href='registration.php'>назад</a>");
if( $password != trim($password))
	exit("Введіть пароль без пробілів!!!" . "<br><a href='registration.php'>назад</a>");
if( $phone != trim($phone))
	exit("Введіть номер мобільного без пробілів!!!" . "<br><a href='registration.php'>назад</a>");
if (strlen($login) <= 5)
	exit("логін надто короткий" . "<br><a href='registration.php'>назад</a>");
if (strlen($password) <= 5)
	exit("пароль надто короткий" . "<br><a href='registration.php'>назад</a>");
if (strlen($phone) <= 10)
	exit("Номер мобільного надто короткий" . "<br><a href='registration.php'>назад</a>");
// обрізаємо хтмл теги.. 
include ("bd.php"); // підключаємося до бази 
$result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
$myrow = mysql_fetch_array($result);
if( !empty($myrow['id'])) {
	exit ("Введіть інший логін. Вже існує користувач з таким" . "<br>" . "<a href='registration.php'>повернутись назад</a>");
}
//якщо логін вільний
    $result2 = mysql_query ("INSERT INTO users (login,password,phone) VALUES('$login','$password', '$phone')"); 
//       echo $result2;
    if ($result2==TRUE)
    {
    echo "Ви звреєстовані на нашому сайті!" . "<br>" . "<a href='index.php'>Ви можете відвідати наш сайт</a>";
    }
 else {
    echo "Спробуйте ще раз. Ви не зареєстровані" . "<br>" . "<a href='registration.php'>повернутись назад</a>";
#   echo $result2;
    }
    




?>