<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="container">
    <div class="card mt-3">
        <div class="card-body text-center">
            Perpustakaan SMK PALAPA Semarang
        </div>
    </div>

    <div class="container d-flex justify-content-end mb-4 mt-3">
        <form class="form-inline" method="GET">
            <div class="form-group mx-2">
                <label for="searchInput" class="sr-only">Cari Buku</label>
                <input type="text" class="form-control" id="searchInput" name="cari" placeholder="Cari Buku"
                    value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
                <button type="submit" class="btn border-dark">🔎</button>
            </div>
        </form>
    </div>

    <?php
    // Koneksi ke database
    include_once("config.php");

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Lakukan query berdasarkan input pencarian
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $query = "SELECT * FROM buku LEFT JOIN kategori ON buku.kategoriID = kategori.kategoriID 
                  WHERE judul LIKE '%$cari%' OR kategori LIKE '%$cari%' OR penulis LIKE '%$cari%' OR penerbit LIKE '%$cari%' OR
                  tahunTerbit LIKE '%$cari%'";
    } else {
        $query = "SELECT * FROM buku LEFT JOIN kategori ON buku.kategoriID = kategori.kategoriID";
    }

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    // Periksa hasil query
    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }
    ?>

    <table class="table">
        <thead>
            <tr>
                <th class="border-left" width="1%">Judul</th>
                <th class="border-left" width="1%">Kategori</th>
                <th class="border-left" width="1%">Penulis</th>
                <th class="border-left" width="1%">Penerbit</th>
                <th class="border-left" width="1%">Tahun Terbit</th>
                <th class="border-left" width="1%">Deskripsi</th>
                <th class="border-left border-right" width="1%">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($data = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td class="border-left" width="1%">
                        <?php echo $data['judul']; ?>
                    </td>
                    <td class="border-left" width="1%">
                        <?php echo $data['kategori']; ?>
                    </td>
                    <td class="border-left" width="1%">
                        <?php echo $data['penulis']; ?>
                    </td>
                    <td class="border-left" width="1%">
                        <?php echo $data['penerbit']; ?>
                    </td>
                    <td class="border-left" width="1%">
                        <?php echo $data['tahunTerbit']; ?>
                    </td>
                    <td class="border-left" width="1%">
                        <?php
                        $deskripsi = $data['deskripsi'];
                        $kata = str_word_count($deskripsi, 0); // Menghitung jumlah kata
                    
                        if ($kata > 5) {
                            $deskripsiPotong = implode(' ', array_slice(str_word_count($deskripsi, 2), 0, 6)) . '...';
                            echo $deskripsiPotong;
                        } else {
                            echo $deskripsi;
                        }
                        ?>
                    </td>
                    <td class="border-left border-right" width="1%">
                        <a href="?page=koleksi/koleksiTambah&id=<?php echo $data['bukuID']; ?>"
                            class="btn btn-danger text-white" title="Tambah ke Favorit">
                            <i class="fa fa-heart"></i>
                        </a>
                        <a class="btn btn-info" href="?page=peminjaman/peminjamanTambah&bukuID=<?= $data['bukuID'] ?>">
                            Peminjam
                        </a>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>