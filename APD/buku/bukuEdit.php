<div class="card mt-4">
    <div class="card-title text-center">
        <h1 class="mt-3 border-bottom">Tambah Data Buku</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
                        if (isset($_POST['submit'])) {
                            $KategoriID = $_POST['kategoriID'];
                            $judul = $_POST['judul'];
                            $penulis = $_POST['penulis'];
                            $penerbit = $_POST['penerbit'];
                            $tahunTerbit = $_POST['tahunTerbit'];
                            $deskripsi = $_POST['deskripsi'];
                            $query = mysqli_query($koneksi, "UPDATE buku SET KategoriID = '$KategoriID', judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', tahunTerbit = '$tahunTerbit', deskripsi = '$deskripsi' WHERE bukuID = $id");

                                if ($query) {
                                    echo '<script>alert("Tambah data berhasil");</script>';
                                    header("location: buku/buku");
                                } else {
                                    echo '<script>alert("Tambah data gagal: ' . mysqli_error($koneksi) . '");</script>';
                                }
                            }
                        
                            $query = mysqli_query($koneksi, "SELECT*FROM buku WHERE bukuID=$id");
                            $data = mysqli_fetch_array($query);
                        
                        ?>
                    <div class="mb-3">
                        <label for="namaKategori" class="form-label">Kategori Buku</label>
                        <select class="form-control" name="kategoriID" id="kategoriID">
                            <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while ($kategori = mysqli_fetch_array($query)) {
                                ?>
                            <option
                                <?php if (isset($data['kategoriID']) && $kategori['kategoriID'] == $data['kategoriID']) echo 'selected'; ?>
                                value="<?php echo $kategori['kategoriID']; ?>">
                                <?php echo $kategori['kategori']; ?>
                            </option>
                            <?php
                                }
                                ?>
                        </select>

                    </div>
                    <div class=" mb-3">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul" value="<?php echo $data['judul']; ?> "
                            name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" value="<?php echo $data['penulis']; ?>"
                            name="penulis" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" value="<?php echo $data['penerbit']; ?>"
                            name="penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" id="tahunTerbit"
                            value="<?php echo $data['tahunTerbit']; ?>" name="tahunTerbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <textarea type="text" class="form-control" id="deskripsi"
                            name="deskripsi"><?php echo $data['deskripsi']; ?></textarea>
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