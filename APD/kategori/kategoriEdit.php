<div class="card mt-4">
    <div class="card-title text-center">
        <h1 class="mt-3 border-bottom">Edit Kategori</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                        if(isset($_POST['submit'])){
                            $id = $_GET['id'];
                            $kategori = $_POST['namaKategori'];
                            $query = mysqli_query($koneksi, "UPDATE kategori SET namaKategori='$kategori' WHERE kategoriID=$id");

                            if($query){
                                echo '<script>alert("Data berhasil disimpan")</script>';
                            }else{
                                echo "<script>alert('Gagal menyimpan')</script>";
                            }
                        }

                        // Ambil data kategori berdasarkan ID dari URL
                        $id = $_GET['id'];
                        $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategoriID=$id");
                        $data = mysqli_fetch_array($query);

                        // Tutup koneksi
                        mysqli_close($koneksi);
                    ?>
                    <div class="mb-3">
                        <label for="namaKategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="namaKategori" name="kategori"
                            value="<?php echo $data['kategori']; ?>" placeholder="Masukkan Kategori Buku..." required>
                    </div>
                    <div class="d-flex mt-4 mx-3 justify-content-center">
                        <button type="submit" class="btn btn-primary ml-3" name="submit"><i
                                class="fas fa-floppy-disk"></i></button>&nbsp;
                        <button type="reset" class="btn btn-secondary ml-3"><i
                                class="fas fa-rotate-right"></i></button>&nbsp;
                        <a href="?page=kategori/kategori" class="btn btn-danger ml-3"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>