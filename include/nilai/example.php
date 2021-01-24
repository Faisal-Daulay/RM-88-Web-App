<div class="col-md-12">
    <h2 class="text-center text-uppercase">
        Silahkan Lakukan Penilaian
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
                    <div class="div">
                      <input type="hidden" id="<?= $nama;?>1_hidden" value="1">
                      <img src="img/star1.png" onmouseover="change(this.id);" id="<?= $nama;?>1" class="<?= $nama;?>">

                      <input type="hidden" id="<?= $nama;?>2_hidden" value="2">
                      <img src="img/star1.png" onmouseover="change(this.id);" id="<?= $nama;?>2" class="<?= $nama;?>">

                      <input type="hidden" id="<?= $nama;?>3_hidden" value="3">
                      <img src="img/star1.png" onmouseover="change(this.id);" id="<?= $nama;?>3" class="<?= $nama;?>">

                      <input type="hidden" id="<?= $nama;?>4_hidden" value="4">
                      <img src="img/star1.png" onmouseover="change(this.id);" id="<?= $nama;?>4" class="<?= $nama;?>">

                      <input type="hidden" id="<?= $nama;?>5_hidden" value="5">
                      <img src="img/star1.png" onmouseover="change(this.id);" id="<?= $nama;?>5" class="<?= $nama;?>">
                    </div>
                    <input type="hidden" name="rating[<?= $id_kar; ?>]" id="<?= $nama;?>rating" value="0">
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
<div class="col-md-6 text-center mt-5">
    <input type="submit" class="btn btn-success text-uppercase" value="Simpan" style="width: 200px">
</div>
</form>
</div>
