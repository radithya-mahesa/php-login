<?php
    include_once __DIR__ . "/../config/koneksi.php";
    session_start();

    if(isset($_SESSION["is_login"])) {
        header("location: /php-login-sigma/login/dashboard/dashboard.php");
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash_password = hash('sha256', $password);
    
        $sql = "SELECT * FROM tbuser WHERE username='$username' AND 
        password='$hash_password'";
    
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_login"] = true;
            echo "<script>alert('HORE HORE KAMU BERHASIL LOGIN😹')</script>";
            header("location: /php-login-sigma/login/dashboard/dashboard.php");
        } else {
            echo "<script>alert('LMAO PASSWORD SALAH😹😹😹')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radit Sigma</title>
    <?php include_once __DIR__ . "/../config/bootstrap.html" ?>
    <style>p { color: #000; }</style>
</head>
<body>
    <?php include_once __DIR__ . "/../layout/build/header.html" ?>
    <div class="container">
        <h2>LOGIN SIGMA</h2>
        <form name="register-login" action="login.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="username" required oninvalid="this.setCustomValidity('KOK KOSONG SIH 😹')"
                oninput="this.setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Masukin Password nya 😹" name="password" required oninvalid="this.setCustomValidity('KOK KOSONG SIH 😹')"
                oninput="this.setCustomValidity('')">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
        <button class="btn btn-danger" style="margin: 10px 0;">
            <a href="../index.php">Balik lagi ke home😹</a>
        </button>
    </div>
    <?php include_once __DIR__ . "/../layout/build/footer.html" ?>
</body>
</html>