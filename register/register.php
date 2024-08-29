<?php
include_once "../config/koneksi.php";
session_start();

if (isset($_SESSION["is_login"])) {
    header("location: dashboard/dashboard.php");
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $hash_password = hash('md5', $password);


    $sql = "INSERT INTO tbuser (username, nama, password) VALUES 
        ('$username', '$nama', '$hash_password')";

    try {
        if ($conn->query($sql)) {
            echo "<script>alert('HORE DAFTAR AKUN BERHASIL🥳, TINGGAL LOGIN😹')</script>";
        } else {
            echo "<script>alert('AWOAKWOAKOA DAFTAR AKUN GAGAL, COBA LAGI😹')</script>";
        }
    } catch (mysqli_sql_exception $e) {
        echo "<script>alert('SALAH SATU DATA SUDAH DIGUNAKAN 😹😹😹')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "../config/bootstrap.html" ?>
    <title>Document</title>
    <style>p{ color: black; }</style>
</head>
<body>
<?php include_once "../layout/build/header.html" ?>
    <div class="container">
        <h2>Register Sigma</h2>
        <form name="register-login" action="register.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" placeholder="Gelar ga perlu dibawa😹" aria-label="Username" name="nama" oninvalid="this.setCustomValidity('KOK KOSONG SIH 😹')"
                oninput="this.setCustomValidity('')">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="username" required oninvalid="this.setCustomValidity('KOK KOSONG SIH 😹')"
                oninput="this.setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Jangan Admin#1234😹" name="password" required oninvalid="this.setCustomValidity('KOK KOSONG SIH 😹')"
                oninput="this.setCustomValidity('')">
            </div>
            <button type="submit" class="btn btn-success" name="register">Register</button>
        </form>
        <button class="btn btn-danger" style="margin: 10px 0;">
            <a href="../index.php">Balik lagi ke home😹</a>
        </button>
    </div>
    <?php include_once "../layout/build/footer.html" ?>
</body>

</html>