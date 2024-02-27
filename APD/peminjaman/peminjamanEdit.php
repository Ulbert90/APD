<div class="card mt-4">
    <div class="card-title text-center">
        <h1 class="mt-3 border-bottom">Pinjam Buku</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    include_once 'config.php';

                    if (!isset($_SESSION['users'])) {
                        header('Location: login.php');
                        exit();
                    }

                    if (isset($_POST['submit'])) {
                        $id = $_GET['id'];
                        $bukuID = $_POST['bukuID'];
                        $tanggalPeminjaman = $_POST['tanggalPeminjaman'];
                        $tanggalPengembalian = $_POST['tanggalPengembalian'];
                        $statusPeminjaman = $_POST['statusPeminjaman'];
                        $query = mysqli_query($koneksi, "UPDATE peminjaman SET bukuID = '$bukuID', tanggalPeminjaman = '$tanggalPeminjaman', tanggalPengembalian = '$tanggalPengembalian', statusPeminjaman = '$statusPeminjaman' WHERE peminjamanID = $id");

                        if ($query) {
                            echo '<script>alert("Update data berhasil"); window.location.href="?page=peminjaman/peminjaman";</script>';
                            exit;
                        } else {
                            echo '<script>alert("Update data gagal: ' . mysqli_error($koneksi) . '");</script>';
                        }
                    }

                    $id = $_GET['id'];
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE peminjamanID=$id");
                    $data = mysqli_fetch_array($query);

                    ?>
                    <div class="row mb-3">
                        <label for="bukuID" class="form-label">Pinjam Buku</label>
                        <select class="form-control" name="bukuID" id="bukuID">
                            <?php
                            $kat = mysqli_query($koneksi, "SELECT * FROM buku");
                            while ($row = mysqli_fetch_assoc($kat)) {
                                $selected = ($row['bukuID'] == $data['bukuID']) ? 'selected' : '';
                                ?>
                                <option value="<?= $row['bukuID'] ?>" <?= $selected ?>>
                                    <?= $row['judul'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPeminjaman" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" id="tanggalPeminjaman" name="tanggalPeminjaman"
                            value="<?php echo $data['tanggalPeminjaman']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPengembalian" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="tanggalPengembalian" name="tanggalPengembalian"
                            value="<?php echo $data['tanggalPengembalian']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="statusPeminjaman" class="form-label">Status Pengembalian</label>
                        <select class="form-select" id="statusPeminjaman" name="statusPeminjaman">
                            <option value="dipinjam" <?php if ($data['statusPeminjaman'] == 'dipinjam')
                                echo 'selected'; ?>>Dipinjam</option>
                            <option value="dikembalikan" <?php if ($data['statusPeminjaman'] == 'dikembalikan')
                                echo 'selected'; ?>>Dikembalikan</option>
                        </select>
                    </div>

                    <div class="d-flex mt-4 mx-3 justify-content-center">
                        <button type="submit" class="btn btn-primary ml-3" name="submit"><i
                                class="fas fa-floppy-disk"></i></button>&nbsp;
                        <button type="reset" class="btn btn-secondary ml-3"><i class="fas fa-rotate-right"></i>
                        </button>&nbsp;
                        <a href="?page=peminjaman/peminjaman" class="btn btn-danger ml-3"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>