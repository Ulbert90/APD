<?php
include_once('config.php');

if (!isset($_SESSION['users'])) {
    header("Location: ../login.php"); // Redirect to the login page if not logged in
    exit();
}

if (isset($_POST['submit'])) {
    $userID = $_SESSION['users']['userID'];
    $bukuID = $_POST['bukuID'];

    // Validate if book ID is not empty
    if (!empty($bukuID)) {
        // Prepare SQL statement to prevent SQL injection
        $stmt = $koneksi->prepare("INSERT INTO koleksi (userID, bukuID) VALUES (?, ?)");
        $stmt->bind_param("ss", $userID, $bukuID);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Berhasil ditambahkan</div>";
            // Optionally, redirect to a success page or list of collections
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "<div class='alert alert-danger'>Book ID is required</div>";
    }
}
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
                    <div class="d-flex mt-4 mx-3 justify-content-center">
                        <button type="submit" class="btn btn-primary ml-3" name="submit"><i
                                class="fas fa-floppy-disk"></i></button>&nbsp;
                        <button type="reset" class="btn btn-secondary ml-3"><i
                                class="fas fa-rotate-right"></i></button>&nbsp;
                        <a href="?page=koleksi/koleksi" class="btn btn-danger ml-3"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>