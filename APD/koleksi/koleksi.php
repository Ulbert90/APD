<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'perpus');

// Periksa koneksi database
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil userID dari sesi
$loggedInUserID = $_SESSION['users']['userID'];

// Query SQL untuk memilih koleksi berdasarkan userID
$query = mysqli_query($koneksi, "SELECT buku.* FROM buku 
            INNER JOIN koleksi ON buku.bukuID = koleksi.bukuID 
            WHERE koleksi.userID = $loggedInUserID");

// Periksa hasil query
if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}
?>

<!-- Tampilkan data koleksi -->
<div class="card mt-4">
    <div class="card-header">
        <i class="fas fa-heart text-danger"></i>
        <?php echo "Koleksi <u>" . $_SESSION['users']['nama'] . "</u>"; ?>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <?php echo $data['judul']; ?>
                            </td>
                            <td>
                                <?php echo $data['penulis']; ?>
                            </td>
                            <td>
                                <?php echo $data['penerbit']; ?>
                            </td>
                            <td>
                                <?php echo $data['tahunTerbit']; ?>
                            </td>
                            <td>
                                <?php echo $data['deskripsi']; ?>
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