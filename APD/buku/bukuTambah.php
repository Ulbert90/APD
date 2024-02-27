<div class="card mt-4">
    <div class="card-title text-center">
        <h1 class="mt-3 border-bottom">Tambah Data Buku</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $kategoriID = $_POST['kategoriID'];
                        $judul = $_POST['judul'];
                        $penulis = $_POST['penulis'];
                        $penerbit = $_POST['penerbit'];
                        $tahunTerbit = $_POST['tahunTerbit'];
                        $deskripsi = $_POST['deskripsi'];
                        $query = mysqli_query($koneksi, "INSERT INTO buku (kategoriID, judul, penulis, penerbit, tahunTerbit, deskripsi) VALUES ('$kategoriID','$judul','$penulis','$penerbit','$tahunTerbit','$deskripsi')");

                        if ($query) {
                            echo '<script>alert("Tambah data berhasil");</script>';
                        } else {
                            echo '<script>alert("Tambah data gagal: ' . mysqli_error($koneksi) . '");</script>';
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <label for="namaKategori" class="form-label">Kategori Buku</label>
                        <select class="form-control" name="kategoriID" id="kategoriID">
                            <?php
                            $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while ($data = mysqli_fetch_array($kat)) {
                                ?>
                                <option value="<?= $data['kategoriID'] ?>">
                                    <?= $data['kategori'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                        <select class="form-select" id="tahunTerbit" name="tahunTerbit" required>
                            <?php
                            // Tentukan range tahun yang ingin ditampilkan
                            $start_year = 1900;
                            $end_year = date("Y");

                            // Buat opsi-opsi tahun dari start_year hingga end_year
                            for ($year = $end_year; $year >= $start_year; $year--) {
                                echo "<option value='$year'>$year</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tahunTerbit" class="form-label">deskripsi</label>
                        <textarea type="number" class="form-control" id="tahunTerbit" name="deskripsi"
                            required></textarea>
                    </div>
                    <div class="d-flex mt-4 mx-3 justify-content-center">
                        <button type="submit" class="btn btn-primary ml-3" name="submit"><i
                                class="fas fa-floppy-disk"></i></button>&nbsp;
                        <button type="reset" class="btn btn-secondary ml-3"><i
                                class="fas fa-rotate-right"></i></button>&nbsp;
                        <a href="?page=buku/buku" class="btn btn-danger ml-3"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>