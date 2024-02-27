<?php
// Assuming $koneksi is your database connection variable
$id = $_GET['id']; // Assuming you are passing the 'id' parameter through the URL

// Use mysqli_real_escape_string to prevent SQL injection
$id = mysqli_real_escape_string($koneksi, $id);

$query = mysqli_query($koneksi, "DELETE FROM buku WHERE bukuID='$id'");
?>
<script>
alert("Data Kategori Buku Berhasil Dihapus!");
location.href = "?page=buku/buku"
</script>