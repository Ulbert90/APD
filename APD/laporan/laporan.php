<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan | ADMIN</title>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Laporan Data Buku</h1>
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-floppy-disk me-1"></i>
                    Laporan
                </div>

                <a href="?page=laporan/cetak" target="_blank" class="btn btn-success">
                    <i class="fas fa-print"></i> Cetak
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th>User</th>
                                <th>Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
                                <th width="14%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM peminjaman JOIN buku ON peminjaman.bukuID = buku.bukuID 
                                JOIN users ON peminjaman.userID = users.userID");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?php echo $data['tanggalPeminjaman']; ?></td>
                                <td><?php echo $data['tanggalPengembalian']; ?></td>
                                <td><?php echo $data['statusPeminjaman']; ?></td>
                                <td class="d-grid gap-2 d-md-block">
                                    <a href="?page=ulasan/ulasanEdit&id=<?php echo $data['peminjamanID']; ?>"
                                        data-toggle="modal" class="btn btn-warning text-white"><i
                                            class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                        href="?page=ulasan/ulasanHapus&id=<?php echo $data['peminjamanID']; ?>"
                                        data-toggle="modal" class="btn btn-danger justify-content-end">
                                        <i class="fa fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>