<?php
/*
 * реалізує реєстрацію та авторизацію на сайті
 * не взаємодіє з models
 */
session_start();
$view = empty($_GET['view']) ? 'index' : $_GET['view'];
switch ($view) {
    case('RegisterMethod'):
        if (isset($_GET['login'])) {
            $login = $_GET['login'];
            if ($login == '') {
                unset($login);
            }
        } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
        if (isset($_GET['password'])) {
            $password = $_GET['password'];
            if ($password == '') {
                unset($password);
            }
        }
        //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

        if (empty($login) or empty($password)) { //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
            exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
        }
        //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
        $login = stripslashes($login);
        $login = htmlspecialchars($login);

        $password = stripslashes($password);
        $password = htmlspecialchars($password);

        //удаляем лишние пробелы
        $login = trim($login);
        $password = trim($password);

        //добавляем проверку на длину логина и пароля
        if (strlen($login) < 3 or strlen($login) > 15) {
            exit("Логин должен состоять не менее чем из 3 символов и не более чем из 15.");
        }
        if (strlen($password) < 3 or strlen($password) > 15) {
            exit("Пароль должен состоять не менее чем из 3 символов и не более чем из 15.");
        }

        $password = md5($password); //шифруем пароль

        $password = strrev($password); // для надежности добавим реверс

        $password = $password . "b3p6f";
        $res = RegisterModel::Register($login, $password);
        $_SESSION['reg'] = $res;
        header('location:index.php?view=auth');
        break;
    case(AuthMethod):
        $dbcon = ViewGetTools::connect();
        if (isset($_GET['login'])) {
            $login = $_GET['login'];
            if ($login == '') {
                unset($login);
            }
        } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
        if (isset($_GET['password'])) {
            $password = $_GET['password'];
            if ($password == '') {
                unset($password);
            }
        }
        //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

        if (empty($login) or empty($password)) { //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
            exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
        }
        //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
        $login = stripslashes($login);
        $login = htmlspecialchars($login);

        $password = stripslashes($password);
        $password = htmlspecialchars($password);

        //удаляем лишние пробелы
        $login = trim($login);
        $password = trim($password);

        // минипроверка на подбор паролей
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        if (empty($ip) || $ip == 'unknown') {
            $ip = getenv("REMOTE_ADDR");
        }

        $dbcon->exec("DELETE FROM errors WHERE UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date) > 900"); //удаляем ip-адреса ошибавшихся при входе пользователей через 15 минут.
        $result = $dbcon->query("SELECT col FROM errors WHERE ip='$ip'"); // извлекаем из базы колличество неудачных попыток входа за последние 15 минут у пользователя с данным ip
        $myrow = $result->fetchall(PDO::FETCH_ASSOC);

        if ($myrow['col'] > 2) {
            //если таковых попыток больше трех, то выдаем сообщение.
            exit("Вы набрали логин или пароль неверно 3 раза. Подождите 15 минут до следующей попытки.");
        }


        $password = md5($password); //шифруем пароль
        $password = strrev($password); // для надежности добавим реверс
        $password = $password . "b3p6f";
        //можно добавить несколько своих символов по вкусу, например, вписав "b3p6f". Если этот пароль будут взламывать методом подбора у себя на сервере этой же md5,то явно ничего хорошего не выйдет. Но советую ставить другие символы, можно в начале строки или в середине.
        //При этом необходимо увеличить длину поля password в базе. Зашифрованный пароль может получится гораздо большего размера.

        $result = $dbcon->query("SELECT * FROM users WHERE login='$login' AND password='$password'"); //извлекаем из базы все данные о пользователе с введенным логином
        $myrow = $result->fetch(PDO::FETCH_ASSOC);
        if (empty($myrow['id'])) {
            //если пользователя с введенным логином и паролем не существует,то записываем ip пользователя и с датой ошибки

            $select = $dbcon->query("SELECT ip FROM errors WHERE ip='$ip'");
            $tmp = $select->fetchall(PDO::FETCH_ASSOC);
            if ($ip == $tmp[0]) {
                //проверяем, есть ли пользователь в таблице "errors"
                $result52 = $dbcon->query("SELECT col FROM errors WHERE ip='$ip'");
                $myrow52 = $result52->fetchall(PDO::FETCH_ASSOC);

                $col = $myrow52[0] + 1; //Если есть,то приплюсовываем количесво 
                $dbcon->exec("UPDATE errors SET col=$col,date=NOW() WHERE ip='$ip'");
            } else {
                //если за последние 15 минут ошибок не было, то вставляем новую запись в таблицу "errors"
                $dbcon->exec("INSERT INTO errors (ip,date,col) VALUES ('$ip',NOW(),'1')");
            }

            exit("Извините, введённый вами логин или пароль неверный.");
        } else {

            //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
            $_SESSION['password'] = $myrow['password'];
            $_SESSION['login'] = $myrow['login'];
            $_SESSION['id'] = $myrow['id']; //эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
            //Далее мы запоминаем данные в куки, для последующего входа.
            if (isset($_GET['save'])) {
                //Если пользователь хочет, чтобы его данные сохранились для последующего входа, то сохраняем в куках его браузера
                setcookie("login", $_GET["login"], time() + 9999999);
                setcookie("password", $_GET["password"], time() + 9999999);
            }
        }
        header('location:index.php?view=auth');
        break;
    case 'ExitMethod':
        unset($_SESSION['login']);
        header('location:index.php?view=auth');
        break;
}
?>