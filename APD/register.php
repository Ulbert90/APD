<?php
require_once 'config.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];  // Assuming 'nama' is part of the registration form
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];

    $query = "INSERT INTO users (role, nama, username, password, alamat) VALUES ('$role', '$nama', '$username', '$password', '$alamat')";
    
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo '<script>alert("Pendaftaran berhasil. Silakan login."); location.href="login.php";</script>';
    } else {
        echo '<script>alert("Pendaftaran gagal.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <title>login perpus palapa</title>
    <link rel="stylesheet" href="assets/">
</head>
<style>
body {
    background-image: url('https://img.freepik.com/free-photo/hand-painted-watercolor-background-with-sky-clouds-shape_24972-1095.jpg?w=996&t=st=1705748883~exp=1705749483~hmac=6cd79cc787cc69c8e099876aa976d75d18add4e21f35109276961b2b12c5352c');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
    height: 100dvh;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>

<body>
    <section>
        <div class="card" style="background-color: #fff;">
            <div class="row g-0">
                <h5 class="card-title text-center mt-3 mb-3">Login Perpus</h5>
                <hr>
                <div class="col-md-6">
                    <img src="https://img.freepik.com/free-vector/focused-tiny-people-reading-books_74855-5836.jpg?w=740&t=st=1706205376~exp=1706205976~hmac=4ec1a2027e183eb1d1d01e0955ff1e9b27e02eb749e249c5eaa9e7d319ed12fd"
                        class="card-img-top" alt="User Image">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <!-- Login Form -->
                        <form method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" class="form-select py-2" id="role">
                                    <option value="Admin">Admin</option>
                                    <option value="Peminjam">Peminjam</option>
                                </select>
                            </div>

                    </div>
                    <div class="d-grid">
                        <button class="btn btn-success" type="submit" name="register">Register</button>
                    </div>
                    <p class="mt-2">Sudah Punya Akun?<a href="login.php"> Login</p>
                    </form>

                </div>
            </div>
        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>   
</body>

</html>