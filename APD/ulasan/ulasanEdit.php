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
                            $bukuID = $_POST['bukuID'];
                            $userID = $_SESSION['users']['userID'];
                            $ulasan = $_POST['ulasan'];
                            $rating = $_POST['rating'];
                            $query = mysqli_query($koneksi, "UPDATE ulasan SET bukuID = '$bukuID', ulasan = '$ulasan', rating = '$rating' WHERE ulasanID = $id");

                                if ($query) {
                                    echo '<script>alert("Edit data berhasil");</script>';
                                } else {
                                    echo '<script>alert("Edit data gagal: ' . mysqli_error($koneksi) . '");</script>';
                                }
                            }
                        
                            $query = mysqli_query($koneksi, "SELECT*FROM ulasan WHERE ulasanID=$id");
                            $data = mysqli_fetch_array($query);
                        
                        ?>
                    <div class="mb-3">
                        <label for="buku" class="form-label">Judul Buku</label>
                        <select class="form-control" name="bukuID" id="bukuID">
                            <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM buku");
                                while ($buku = mysqli_fetch_array($query)) {
                                ?>
                            <option
                                <?php if (isset($data['bukuID']) && $buku['bukuID'] == $data['bukuID']) echo 'selected'; ?>
                                value="<?php echo $buku['bukuID']; ?>">
                                <?php echo $buku['judul']; ?>
                            </option>
                            <?php
                                }
                                ?>
                        </select>
                    </div>
                    <div class=" mb-3">
                        <label for="ulasan" class="form-label">ulasan Buku</label>
                        <textarea type="text" class="form-control" id="ulasan"
                            name="ulasan"><?php echo $data['ulasan']; ?> </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating:</label>
                        <select class="form-select" name="rating">
                            <?php
                                for($i = 1; $i<=5; $i++){
                                    ?>
                            <option <?php if($data['rating'] == $i) echo 'selected';?>><?php echo $i; ?></option>
                            <?php
                                }
                                ?>
                        </select>
                    </div>
                    <div class="d-flex mt-4 mx-3 justify-content-center">
                        <button type="submit" class="btn btn-primary ml-3" name="submit"><i
                                class="fas fa-floppy-disk"></i></button>&nbsp;
                        <button type="reset" class="btn btn-secondary ml-3"><i
                                class="fas fa-rotate-right"></i></button>&nbsp;
                        <a href="?page=ulasan/ulasan" class="btn btn-danger ml-3"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>