<?php
 /**
 * Обработчик формы авторизации
 * Site: http://bezramok-tlt.ru
 * Авторизация пользователя
 */
 
 //Выход из авторизации
 if(isset($_GET['exit']) == true){
 	//Уничтожаем сессию
 	session_destroy();

 	//Делаем редирект
 	header('Location:'. BEZ_HOST .'?mode=auth');
 	exit;
 }

function auth($pdo) {
    if (isset($_POST['mode'])) {

        //Проверяем на пустоту
        if (empty($_POST['loginName']))
            $err[] = ['Login not entered'];

        if (empty($_POST['loginPassword']))
            $err[] = ['Password not entered'];

        //Проверяем наличие ошибок и выводим пользователю
        if (count($err) > 0)
            return json_encode([
                    'success' => 'authErr',
                    'message' => $err
                ]);

        else {
            /*Создаем запрос на выборку из базы
            данных для проверки подлиности пользователя*/
            $query = 'SELECT * 
                FROM users
                WHERE userName = ?';
            //Подготавливаем PDO выражение для SQL запроса
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_POST['loginName']]);

            //Получаем данные SQL запроса
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);

            //Если логин совподает, проверяем пароль
            if ($rows) {
                //Получаем данные из таблицы
                if (md5(md5($_POST['loginPassword']) . $rows['salt']) == $rows['password']) {
                    $_SESSION['user'] = true;

                    //Сбрасываем параметры
                    header('Location:' . BEZ_HOST . '/scripts/auth/show?mode=auth');
                    exit;
                } else
                    return getResponce('passErr', ['wrong password']);
            } else {
                return getResponce('passErr', ['Username '.$_POST['loginName'].' not found!']);
            }
        }
    }
}
?>