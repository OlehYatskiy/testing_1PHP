<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet/less" type="text/css" href="css/index.less" />
    <link rel="stylesheet/less" type="text/css" href="css/media.less" />
    <link rel="stylesheet" type="text/css" href="fonts/fonts.css" />
    <link rel="stylesheet/less" type="text/css" href="css/show.less" />
    <script src="lessJs/less.min.js" ></script>
    <title>Welcome</title>
</head>
<!-- Если авторизован выведет приветствие -->

<body>
<div class="container">
    <?php if(isset($_SESSION['user'])) : ?>

    <div class="form-outer">
        <h2 class="form-outer-h2">Welcome <?php echo $_SESSION['user']->userName; ?></h2>
        <div class="container-form">
            <div class="form-header">
                <div class="form-header-icon"></div>
                <h1 class="form-header-label">Welcome <?php echo $_SESSION['user']->userName; ?></h1>
            </div>
            <a href="logout.php">Выйти</a> <!-- файл logout.php создадим ниже -->
            <!-- Пользователь может нажать выйти для выхода из системы -->
        </div>
    </div>
    <?php else : ?>
        <h2 class="form-outer-h2">You are not log in!</h2>
    <?php endif; ?>
</div>
</body>
</html>

