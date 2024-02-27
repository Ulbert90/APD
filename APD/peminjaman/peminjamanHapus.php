<?php
// Assuming $koneksi is your database connection variable
$id = $_GET['id']; // Assuming you are passing the 'id' parameter through the URL

// Use mysqli_real_escape_string to prevent SQL injection
$id = mysqli_real_escape_string($koneksi, $id);

$query = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE peminjamanID='$id'");
?>
<script>
alert("Buku Telah Dikembalikan");
location.href = "?page=peminjaman/peminjaman"
</script>