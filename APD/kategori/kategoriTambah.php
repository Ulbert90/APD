<div class="card mt-4">
    <div class="card-title text-center">
        <h1 class="mt-3 border-bottom">Tambah Kategori</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                        if (isset($_POST['submit'])) {
                            $namaKategori = $_POST['namaKategori'];

                            // Validate if category name is not empty
                            if (!empty($namaKategori)) {
                                // Prepare SQL statement to prevent SQL injection
                                $stmt = $koneksi->prepare("INSERT INTO kategori (kategori) VALUES (?)");
                                $stmt->bind_param("s", $namaKategori);

                                // Execute the statement
                                if ($stmt->execute()) {
                                    echo "<div class='alert alert-success'>Berhasil di tambahkan</div> ";
                                    // Optionally, redirect to a success page or list of categories
                                } else {
                                    echo "Error: " . $stmt->error;
                                }
                            } 
                        }
                    ?>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="namaKategori"
                            placeholder="Masukkan Kategori Buku..." required>
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