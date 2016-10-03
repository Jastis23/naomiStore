<?
Class RegisterModel
{
	public static function Register($login,$password)
	{
		// проверка на существование пользователя с таким же логином
		$dbcon=ViewGetTools::connect();
		$result=$dbcon->query("SELECT id FROM users WHERE login='$login'");
		$row=$result->fetchall(PDO::FETCH_ASSOC);
		//$result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
		//$myrow = mysql_fetch_array($result);
		if (!empty($row['id'])) {
		return ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
		}

		// если такого нет, то сохраняем данные
		$result2 =$dbcon->prepare("INSERT INTO users (login,password) VALUES('$login','$password')");
		$result2->execute();
		// Проверяем, есть ли ошибки
		if ($result2=='TRUE')
		{
		return "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
		}

		else {
		 return  "Ошибка! Вы не зарегистрированы.";
     }
 	}
 	public static function ChekUser()
 	{
 		$dbcon=ViewGetTools::connect();
 		$ip=getenv("HTTP_X_FORWARDED_FOR");
		if (empty($ip) || $ip=='unknown') { $ip=getenv("REMOTE_ADDR"); }

		$res=$dbcon->prepare("DELETE FROM oshibka WHERE UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date) > 900");//удаляем ip-адреса ошибавшихся при входе пользователей через 15 минут.
		$res->execute();
		$result =$dbcon->query("SELECT col FROM oshibka WHERE ip='$ip'",$db);// извлекаем из базы колличество неудачных попыток входа за последние 15 минут у пользователя с данным ip
		$myrow = $result->fetchall(PDO::FETCH_ASSOC);

		if ($myrow['col'] > 2) {
		//если таковых попыток больше трех, то выдаем сообщение.
		return ("Вы набрали логин или пароль неверно 3 раза. Подождите 15 минут до следующей попытки.");
		}
 	}
 	public static function Auth()
 	{
 		$dbcon=ViewGetTools::connect();

 	}
 }
?>