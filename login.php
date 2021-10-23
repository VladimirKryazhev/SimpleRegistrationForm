<?php 
require "db.php";

$data = $_POST;

if(isset($data['do_login']))
{
	$errors = array();
	$user = R::findOne('users', 'login = ?', array($data['login']));
	if($user) 
	{
		//если логин пользователя существует, то мы проверяем пароль впротивном случае Элсе в самом низу про несуществующий логин
		if(password_verify($data['password'], $user->password)) 
		{
		//Все хорошо, то логиним пользователя через сешн старт  через суперглобальную переменную
			$_SESSION['logged_user'] = $user;
			 echo '<div style="color: green">Вы авторизованы <a href="/index_reg.php">Главная страница</a></div><hr>';
		}else
		{
			$errors[] = 'Неверный пароль!';
		}

	}else
	{
		$errors[] = 'Пользователь с таким логином не найден!';
	}

	if( !empty($errors))
	{
 echo '<div style="color: red;">' .array_shift($errors). '</div><hr>';
	} 

} 

?>

<form action="/login.php" method="POST">
	<p>
		<p><strong>Логин:</strong></p>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>
	<p>
		<p><strong>Пароль:</strong></p>
		<input type="password" name="password" value="<?php echo @$data['password']; ?>">
	</p>
	<p>
		<button type="submit" name="do_login">WELLCOME</button>
	</p>

</form>