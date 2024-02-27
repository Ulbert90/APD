<div class="card mt-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Kategori
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Kategori</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Deskripsi</th>
                        <th width="14%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.kategoriID = kategori.kategoriID");
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['kategori']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['penulis']; ?></td>
                        <td><?php echo $data['penerbit']; ?></td>
                        <td><?php echo $data['tahunTerbit']; ?></td>
                        <td><?php echo $data['deskripsi']; ?></td>
                        <td class="d-grid gap-2 d-md-block">
                            <a href="?page=buku/bukuEdit&id=<?php echo $data['bukuID']; ?>" data-toggle="modal"
                                class="btn btn-warning text-white"><i class="fa fa-pencil"></i></a>
                            <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                href="?page=buku/bukuHapus&id=<?php echo $data['bukuID']; ?>" data-toggle="modal"
                                class="btn btn-danger justify-content-end">
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
<div class="d-grid mt-3">
    <a href="?page=buku/bukuTambah" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Buku</a>
</div>
</div>