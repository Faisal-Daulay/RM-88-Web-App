<div class="col-md-8">
    <h2 class="text-center text-uppercase">
        Update Data Karyawan
    </h2>
    <div class="col-md-5 mt-5" style="position: ralative; left: 50%; transform: translate(-50%);">

        <?php
          include '../include/config.php';

          $id = $_GET['id'];
          $mysql = mysqli_query($db, "SELECT * FROM karyawan WHERE id_kar='$id' ");
          $no=1;
          while ($ambil = mysqli_fetch_array($mysql)) {
            $id_kar = $ambil['id_kar'];
            $nama = $ambil['nama'];
            $alamat = $ambil['alamat'];
            $notel = $ambil['notel'];
            $foto = $ambil['foto'];
        ?>
        <form action="?page=karyawan/edit_pro.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $nama; ?>">
                <input type="hidden" name="id" class="form-control" value="<?= $id_kar; ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat"  value="<?= $alamat; ?>">
            </div>
            <div class="form-group">
                <label>No Telepon/HP</label>
                <input type="number" name="notel" class="form-control"  value="<?= $notel; ?>">
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select class="form-control" name="role1">
                <option value="-">Pilih Jabatan</option>
                <option value="kasir">Kasir</option>
                <option value="koki">Koki</option>
                <option value="kebersihan">Kebersihan</option>
                <option value="barista">Barista</option>
                <option value="parkir">Parkir</option>
                <option value="waiter">Waiter</option>
                <option value="waiters">Waiters</option>
              </select>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="uplaod" class="form-control">
            </div>
            <img src="../img/karyawan_img/<?= $foto; ?>" width="150" class="img-responsive rounded">
            <button type="submit" class="btn btn-success" style="float: right;">Update Data</button>
        </form>
      <?php } ?>
    </div>
</div>
