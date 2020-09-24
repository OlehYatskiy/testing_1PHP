<?php
 /**
 * Обработчик формы регистрации
 */
function register($pdo) {
    if (
        isset($_POST['mode'])  ? $_POST['mode'] : false
    ) {

        /*Проверяем существует ли у нас
			такой пользователь в БД*/
        $query = 'SELECT userName, email
                FROM users
                WHERE userName = ? OR email = ?';
        //Подготавливаем PDO выражение для SQL запроса
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_POST['username'], $_POST['email']]);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);

        //message userName or email has exist
        if($rows) {
            $userExist = $_POST['username'] === $rows['userName'] ? 'name "' . $_POST['username'] . '"' : false;
            $emailExist = $_POST['email'] === $rows['email'] ? 'email "' . $_POST['email'] . '"' : false;
            $err[] = 'User with ' . (($userExist && $emailExist) ?
                ($userExist . ' and ' . $emailExist) :
                ($userExist ?: $emailExist))
                    . ' already exist';
        }

        //Проверяем наличие ошибок и выводим пользователю
        if(count($err) > 0)
            return json_encode(['success' => 'regError', 'message' => $err]);

        //Получаем ХЕШ соли
        $salt = salt();

        //Солим пароль
        $pass = md5(md5($_POST['password']) . $salt);

        /*Если все хорошо, пишем данные в базу*/
        $query = 'INSERT INTO users(
                    email,
                    userName,
                    password,
                    salt,
                    active_hex,
                    status
                    )
                VALUES(
                        :email,
                        :userName,
                        :password,
                        :salt,
                        "' . md5($salt) . '",
                        0
                        )';
        //Подготавливаем PDO выражение для SQL запроса
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->bindValue(':userName', $_POST['username'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $pass, PDO::PARAM_STR);
        $stmt->bindValue(':salt', $salt, PDO::PARAM_STR);
        $stmt->execute();

        return json_encode(['success' => 'ok', 'message' => ['User ' . $_POST['username'] . ' was registered']]);
    } else {
        return json_encode(array('success' => 'regError', 'message' => ['Did not get any credentials']));
    }
}

?>