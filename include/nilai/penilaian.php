<div class="col-md-12">
      <h2 class="text-center text-capitalize">
          Silahkan Beri Penilaian
      </h2>
</div>
<div class="col-md-12 p-5">
  <form action="?page=nilai/pro_rat.php" method="post">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-light">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No Telepon</th>
                  <th>Jabatan</th>
                  <th>Beri Rating</th>
              </tr>
          </thead>
          <tbody>
              <?php
                include 'include/config.php';

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
                  <td><?= $no++; ?></td>
                  <td align="center">
                    <img src="img/karyawan_img/<?= $foto; ?>" alt="<?= $foto; ?>" width="100">
                  </td>
                  <td><?= $nama; ?></td>
                  <td><?= $alamat; ?></td>
                  <td><?= $notel; ?></td>
                  <td class="text-capitalize"><?= $role1; ?></td>
                  <td>
                    <a class="btn btn-primary" href="?page=nilai/form_nilai.php&id=<?= $id_kar; ?>">Kasih Rating</a>
                  </td>
              </tr>
            <?php } ?>
          </tbody>
      </table>
    </div>
</div>
<div class="col-md-6 text-center mt-5">
    <a href="index.php" class="btn btn-success text-uppercase" style="width: 200px">
        Back
    </a>
</div>
