<div class="col-md-8">
    <h2 class="text-center text-uppercase">
        Tambah Data Karyawan
    </h2>
    <div class="col-md-5 mt-5" style="position: ralative; left: 50%; transform: translate(-50%);">
        <form action="?page=karyawan/proses.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
            </div>
            <div class="form-group">
                <label>No Telepon/HP</label>
                <input type="number" name="notel" class="form-control" placeholder="No Telepon/HP">
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
            <button type="submit" class="btn btn-success" style="float: right;">Simpan Data</button>
        </form>
    </div>
</div>
