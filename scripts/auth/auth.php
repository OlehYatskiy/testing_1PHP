<?php
 /**
 * authorization handler
 */
 
 //escape from auth
 if(isset($_GET['exit']) == true){

 	session_destroy();

 	//make redirect
 	header('Location:'. BEZ_HOST .'?mode=auth');
 	exit;
 }

function auth($pdo) {
    if (isset($_POST['mode'])) {

        /*Create a query to select from the database
         data to verify the authenticity of the user*/
        $query = 'SELECT * 
            FROM users
            WHERE userName = ?';

        $stmt = $pdo->prepare($query);
        $stmt->execute([$_POST['loginName']]);

        //fetch SQL query
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);

        //check password, if login correct
        if ($rows) {
            //get data from table
            if (md5(md5($_POST['loginPassword']) . $rows['salt']) == $rows['password']) {
                $_SESSION['user'] = $rows;
                $_COOKIE['CURRENT_SESSION'] = $rows['userName'].$rows['id'];

                return getResponce('ok', $rows);
            } else
                return getResponce('passErr', ['wrong password']);
        } else {
            return getResponce('passErr', ['Username '.$_POST['loginName'].' not found!']);
        }
    }
}
?>