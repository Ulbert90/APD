<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'perpus');
if (!isset($_SESSION['users'])) {
    header("Location: ../login.php"); // Redirect to the login page if not logged in
    exit();
}

if (isset($_POST['submit'])) {
    $userID = $_SESSION['users']['userID'];
    $bukuID = $_POST['bukuID'];
    $tanggalPeminjaman = $_POST['tanggalPeminjaman'];
    $tanggalPengembalian = $_POST['tanggalPengembalian'];
    $statusPeminjaman = $_POST['statusPeminjaman'];

    // Use prepared statements to prevent SQL injection
    $insertQuery = "INSERT INTO peminjaman (userID, bukuID, tanggalPeminjaman, tanggalPengembalian, statusPeminjaman) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $insertQuery);

    mysqli_stmt_bind_param($stmt, "iisss", $userID, $bukuID, $tanggalPeminjaman, $tanggalPengembalian, $statusPeminjaman);
    $insertResult = mysqli_stmt_execute($stmt);

    if ($insertResult) {
        echo "<script>alert('Tambah data berhasil');</script>";
    } else {
        echo "<script>alert('Tambah data gagal: " . mysqli_error($koneksi) . "');</script>";
    }

    mysqli_stmt_close($stmt);
}

$bukuID = $_GET['bukuID'];
?>
<div class="card mt-4">
    <div class="card-title text-center">
        <h1 class="mt-3 border-bottom">Pinjam Buku</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <div class="row mb-3">
                        <label for="namaKategori" class="form-label">Pinjam Buku</label>
                        <select class="form-control" name="bukuID" id="bukuID">
                            <?php
                            $kat = mysqli_query($koneksi, "SELECT * FROM buku");
                            while ($data = mysqli_fetch_array($kat)) {
                                ?>
                                <option value="<?= $data['bukuID'] ?>">
                                    <?= $data['judul'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="tanggalPeminjaman" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" id="tanggalPeminjaman" name="tanggalPeminjaman"
                            value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPengembalian" class="form-label">Tanggal Pengembalian</label>
                        <?php
                        // Hitung tanggal pengembalian (7 hari dari tanggal peminjaman)
                        $tanggalPengembalian = date('Y-m-d', strtotime('+7 days'));
                        ?>
                        <input type="date" class="form-control" id="tanggalPengembalian" name="tanggalPengembalian"
                            value="<?php echo $tanggalPengembalian; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="statusPeminjaman" class="form-label">Status Pengembalian</label>
                        <select class="form-select" id="statusPeminjaman" name="statusPeminjaman">
                            <option value="dipinjam">Dipinjam</option>
                            <option value="dikembalikan">Dikembalikan</option>
                        </select>
                    </div>
                    <div class="d-flex mt-4 mx-3 justify-content-center">
                        <button type="submit" class="btn btn-primary ml-3" name="submit"><i
                                class="fas fa-floppy-disk"></i></button>&nbsp;
                        <button type="reset" class="btn btn-secondary ml-3"><i
                                class="fas fa-rotate-right"></i></button>&nbsp;
                        <a href="?page=peminjaman/peminjaman" class="btn btn-danger ml-3"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>