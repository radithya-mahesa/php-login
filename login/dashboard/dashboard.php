<?php 
    session_start();
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('location: http://localhost/php-login/index.php');
        exit();
    }

    if (!isset($_SESSION['username'])) {
        header('Location: http://localhost/php-login/login/dashboard/not-login/not-login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../layout/style/dashboard.css">
    <?php include_once "../../config/bootstrap.html" ?>
</head>
<body>
    <div class="container">
        <h1>Halo "<?= $_SESSION["username"]?>" Sigma😎</h1>
        <form action="dashboard.php" method="post">
        <button type="submit" name="logout" class="btn btn-danger">LOGOUT😔</button>
    </form>
    </div>
</body>
</html>
