<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUKTI LAPORAN PERPUSTAKAAN PALAPA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center border-bottom">BUKTI LAPORAN<br>PERPUSTAKAAN PALAPA</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM peminjaman 
                                          JOIN buku ON peminjaman.bukuID = buku.bukuID 
                                          JOIN users ON peminjaman.userID = users.userID");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['judul']; ?></td>
                    <td><?php echo date('d F Y', strtotime($data['tanggalPeminjaman'])); ?></td>
                    <td><?php echo date('d F Y', strtotime($data['tanggalPengembalian'])); ?></td>
                    <td><?php echo $data['statusPeminjaman']; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
    function printPage() {
        window.print();
        setTimeout(function() {
            window.close();
        }, 0);
    }

    // Trigger the printPage function when the page is loaded
    window.onload = printPage;
    </script>
</body>

</html>