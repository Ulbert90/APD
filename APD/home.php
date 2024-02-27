<?php $currentHour = date('G');

// Fungsi untuk menentukan ucapan selamat berdasarkan waktu
function greetingMessage($hour)
{
    if ($hour < 12) {
        return "Pagi";
    } elseif ($hour < 18) {
        return "Siang";
    } else {
        return "Malam";
    }
}
?>
<h1 class="my-2">
    <div class="text-center alert alert-secondary" role="alert">
        <?php echo "Selamat " . greetingMessage($currentHour) . ", " . $_SESSION['users']['nama']; ?>
    </div>
</h1>
<hr>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white fw-bold"><i class="fas fa-list"></i> Kategori</div>
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori"));
                ?> Total Kategori
            </div>
            <a class="small text-white stretched-link" href="?page=kategori/kategori">View Details</a>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-lg">
            <div class="card-header bg-success text-white fw-bold"><i class="fas fa-book"></i> Buku</div>
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku"));
                ?> Total Buku
            </div>
            <a class="small text-white stretched-link" href="?page=buku/buku">View Details</a>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-lg">
            <div class="card-header bg-warning text-white fw-bold"><i class="fa-solid fa-magnifying-glass"></i> Ulasan
            </div>
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ulasan"));
                ?> Total Ulasan
            </div>
            <a class="small text-white stretched-link" href="?page=ulasan/ulasan">View Details</a>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-lg">
            <div class="card-header bg-danger text-white fw-bold"><i class="fa-solid fa-user-tie"></i> Pengguna</div>
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM users"));
                ?> Total User
            </div>
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div>
<hr>
<!-- DATA -->
<div class="container">
    <h2 class="alert alert-primary text-center" role="alert">DATA MASTER</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card-body border border-dark">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $i++; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['kategori']; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-body border border-dark">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Judul Buku</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM buku");
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $i++; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['judul']; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-body border border-dark">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Ulasan</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM ulasan");
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $i++; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $ulasan = $data['ulasan'];
                                        $max_length = 28; // Jumlah maksimum karakter sebelum dipotong
                                        // Potong teks ulasan jika terlalu panjang
                                        if (strlen($ulasan) > $max_length) {
                                            $ulasan = substr($ulasan, 0, $max_length) . '...'; // Tambahkan tanda elipsis
                                        }
                                        echo $ulasan;
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        $rating = $data['rating'];
                                        // Ubah rating menjadi bintang
                                        for ($i = 0; $i < 5; $i++) {
                                            if ($rating > $i) {
                                                echo '<i class="fas fa-star text-warning"></i>';
                                            } else {
                                                echo '<i class="far fa-star text-warning"></i>';
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-body border border-dark">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Username</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM users");
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $i++; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['role']; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<footer class="bg-dark text-white text-center py-4 fixed-bottom">
    <div class="container">
        <p>&copy;
            <?php echo date('Y'); ?> SMK PALAPA SEMARANG. All rights reserved.
        </p>
        <p> Jl. Untung Suropati, Kedungpane, Kec. Mijen, Kota Semarang, Jawa Tengah 50211</p>
    </div>
</footer>