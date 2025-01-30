<?php 
require "../../Controller/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // fungsi execute_query hanya bisa digunakan pada PHP 8.2
    $sql = "SELECT * FROM petugas WHERE username=? AND password=?";
    $row = $koneksi->execute_query($sql, [$username, $password])->fetch_assoc();

    // if (mysqli_num_rows($row) == 1) {
    //     $user = mysqli_fetch_assoc($row);
    //     session_start();
    //     $_SESSION['username'] = $username;
    //     if ($user['level'] === 'admin') {                                                                                                                                                                                                                                   
    //         header("location:index-petugas.php");
    //     }
    // } else {
    //     echo "<script>alert('Gagal Login!')</script>";
    // }

    if($row) {
        session_start();
        $_SESSION['id'] = $row['id_petugas'];
        $_SESSION['level'] = $row['level']; 
          header("location:index.php");
    }else{                                   
        echo "<script>alert('Gagal Login')</script>";                               
    }
}
?>

<!DOCTYPE html>
<html lang="en">
                 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
</head>

<body>
    <form action="" method="post" class="form-login">
        <p>Silahkan Login sebagai Admin</p>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>

</html>