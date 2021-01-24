<div class="col-md-12">
      <h2 class="text-center text-capitalize">
          Silahkan Beri Penilaian Mulai dari 1-5
      </h2>
</div>
<div class="col-md-12 p-5">
    <?php
      $napeng = $_SESSION['napeng'];
      $no_struk = $_SESSION['no_struk'];
    ?>
    <form action="?page=nilai/pro_rat.php" method="post">
      <table>
        <tr>
          <td>Nama Pelanggan</td>
          <td>:</td>
          <td><input type="text" name="napeng" value="<?= $napeng; ?>"></td>
        </tr>
        <tr>
          <td>No Struk</td>
          <td>:</td>
          <td><input type="text" name="no_struk" value="<?= $no_struk; ?>"></td>
        </tr>
      </table>
      <?php
        include 'include/config.php';
        $id = $_GET['id'];
        $mysql = mysqli_query($db, "SELECT * FROM karyawan INNER JOIN user ON karyawan.id_kar=user.id_kar WHERE karyawan.id_kar='$id' ORDER BY karyawan.id_kar DESC");
        $no=1;
        while ($ambil = mysqli_fetch_array($mysql)) {
          $id_kar = $ambil['id_kar'];
          $nama = $ambil['nama'];
          $foto = $ambil['foto'];
          $role1 = $ambil['role'];

          if ($foto == "") {
            $foto = "Gambar Belum di Upload";
          }
      ?>

      <input type="hidden" name="id_kar" value="<?= $id_kar; ?>">
      <div class="box-isi">
        <div class="box-img">
          <img src="img/karyawan_img/<?= $foto; ?>" alt="<?= $foto; ?>">
        </div>
        <div class="box-detail">
          <table>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <th class="text-capitalize"><?= $nama; ?></th>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>:</td>
              <th class="text-capitalize"><?= $role1; ?></th>
            </tr>
            <tr>
              <td>Kebersihan</td>
              <td>:</td>
              <td>
                <select name="kebersihan">
                  <option value="-" selected>Beri Rating</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Kerapian</td>
              <td>:</td>
              <td>
                <select name="kerapian">
                  <option value="-" selected>Beri Rating</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Pelayanan</td>
              <td>:</td>
              <td>
                <select name="pelayanan">
                  <option value="-" selected>Beri Rating</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Keramahan</td>
              <td>:</td>
              <td>
                <select name="keramahan">
                  <option value="-" selected>Beri Rating</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Komentar</td>
              <td>:</td>
              <td>
                <textarea name="komentar" rows="5" cols="30"></textarea>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <?php } ?>
      <div class="col-md-6 text-center mt-5" style="position: relative; left: 24%;">
          <a href="?page=nilai/penilaian.php" class="btn btn-success text-uppercase" style="width: 200px">
              Back
          </a>
          <input type="submit" class="btn btn-success text-uppercase" value="Simpan" style="width: 200px">
      </div>
    </form>
</div>
