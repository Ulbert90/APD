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
                        <th width="14%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['kategori']; ?></td>
                        <td class="d-grid gap-2 d-md-block">
                            <a href="?page=kategori/kategoriEdit&id=<?php echo $data['kategoriID']; ?>"
                                data-toggle="modal" class="btn btn-warning text-white"><i class="fa fa-pencil"></i></a>
                            <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                href="?page=kategori/kategoriHapus&id=<?php echo $data['kategoriID']; ?>"
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
<div class="d-grid mt-3">
    <a href="?page=kategori/kategoriTambah" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Kategori</a>
</div>
</div>