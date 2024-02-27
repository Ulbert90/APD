<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'perpus');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userID = $_SESSION['users']["userID"];
    $bukuID = (int) $_POST["bukuID"];
    $ulasan = $_POST["ulasan"];
    $rating = (int) $_POST["rating"];

    // Check if the combination of userID and bukuID already exists
    $checkQuery = "SELECT * FROM ulasan WHERE userID = '$userID' AND bukuID = '$bukuID'";
    $checkResult = mysqli_query($koneksi, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Combination already exists, handle accordingly (e.g., display an error message)
        echo "<div class='alert alert-danger mt-3' role='alert'>Anda Sudah Mengulas Buku ini</div>";
    } else {
        // Perform database insert
        $insertQuery = "INSERT INTO ulasan (userID, bukuID, ulasan, rating) VALUES ('$userID', '$bukuID', '$ulasan', '$rating')";
        $insertResult = mysqli_query($koneksi, $insertQuery);

        if ($insertResult) {
            // Insert successful, you can redirect or display a success message
            echo "<script> data berhasil di tambahkan</script>";
        } else {
            // Insert failed, handle the error (e.g., display an error message)
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}
?>

<body>
    <div class="card mt-4">
        <div class="card-title text-center">
            <h1 class="mt-3 border-bottom">Ulasan</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- Add a form for adding reviews -->
                    <form method="post" action="?page=ulasan/ulasanTambah">
                        <div class="mb-3">
                            <label for="bukuID" class="form-label">Pilih Buku:</label>
                            <select class="form-control" name="bukuID" id="bukuID">
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM buku");
                                while ($data = mysqli_fetch_array($query)) {
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
                            <label for="ulasan" class="form-label">Isi Ulasan:</label>
                            <textarea class="form-control" name="ulasan" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating:</label>
                            <select class="form-select" name="rating">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>



                        <div class="d-flex mt-4 mx-3 justify-content-center">
                            <button type="submit" class="btn btn-primary ml-3" name="submit"><i
                                    class="fas fa-floppy-disk"></i></button>&nbsp;
                            <button type="reset" class="btn btn-secondary ml-3"><i
                                    class="fas fa-rotate-right"></i></button>&nbsp;
                            <a href="?page=ulasan/ulasan" class="btn btn-danger ml-3"><i
                                    class="fas fa-arrow-left"></i></a>
                        </div>
                    </form>
                </div>

                <!-- Include your JavaScript or libraries here -->
</body>

</html>