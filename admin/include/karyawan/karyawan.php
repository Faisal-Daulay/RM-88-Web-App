<div class="col-md-8">
    <h2 class="text-center text-uppercase">
        Data Karyawan
    </h2>
    <a href="?page=karyawan/form.php" class="btn btn-success" style="margin-bottom: 20px;">Tambah Data</a>
    <div class="table-responsive" style="width: 730px;">
        <table class="table table-bordered table-hover table-light">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  include '../include/config.php';

                  $mysql = mysqli_query($db, "SELECT * FROM karyawan INNER JOIN user ON karyawan.id_kar=user.id_kar ORDER BY karyawan.id_kar DESC");
                  $no=1;
                  while ($ambil = mysqli_fetch_array($mysql)) {
                    $id_kar = $ambil['id_kar'];
                    $nama = $ambil['nama'];
                    $alamat = $ambil['alamat'];
                    $notel = $ambil['notel'];
                    $foto = $ambil['foto'];
                    $role1 = $ambil['role'];

                    if ($foto == "") {
                      $foto = "Gambar Belum di Upload";
                    }
                ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $nama; ?></td>
                    <td><?= $alamat; ?></td>
                    <td><?= $notel; ?></td>
                    <td>
                      <img src="../img/karyawan_img/<?= $foto; ?>" width="100px" alt="<?= $foto; ?>">
                    </td>
                    <td class="text-capitalize"><?= $role1; ?></td>
                    <td>
                      <a href="?page=karyawan/edit.php&id=<?= $id_kar; ?>" class="btn btn-primary mb-1">Edit Data</a>
                      <a href="?page=karyawan/delete.php&id=<?= $id_kar; ?>" class="btn btn-dark">Hapus Data</a>
                    </td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
    </div>
</div>
