<div class="col-md-8">
    <h2 class="text-center text-uppercase">
        Laporan
    </h2>
    <div class="table-responsive" style="width: 730px;">
      <a href="?page=laporan/lap_bulanan.php" class="btn btn-primary mb-2">Lihat Laporan Bulanan</a>
      <a href="include/laporan/example.php" class="btn btn-primary mb-2">Lihat Laporan Harian</a>
      <table class="table table-bordered table-hover table-light">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Telepon / HP</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Komentar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  include '../include/config.php';

                  $mysql = mysqli_query($db, "SELECT * FROM karyawan INNER JOIN ratingkami ON karyawan.id_kar = ratingkami.id_kar INNER JOIN user ON karyawan.id_kar = user.id_kar ORDER BY karyawan.id_kar DESC");
                  $no=1;
                  while ($ambil = mysqli_fetch_array($mysql)) {
                    $id_kar = $ambil['id_kar'];
                    $nama = $ambil['nama'];
                    $notel = $ambil['notel'];
                    $role1 = $ambil['role'];
                    $tgl = $ambil['tgl'];
                    $komentar = $ambil['komentar'];

                ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $nama; ?></td>
                    <td><?= $notel; ?></td>
                    <td><?= $role1; ?></td>
                    <td class="text-capitalize"><?= $tgl; ?></td>
                    <td class="text-capitalize"><?= $komentar; ?></td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
    </div>
</div>
