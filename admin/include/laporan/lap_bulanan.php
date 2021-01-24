<div class="col-md-8">
    <h2 class="text-center text-uppercase">
      Laporan Bulanan
    </h2>
    <div class="col-md-5 mt-5" style="position: ralative; left: 50%; transform: translate(-50%);">
        <form action="include/laporan/hasil_lap.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Bulan</label>
                <input type="month" name="start" class="form-control" placeholder="2020-02">
            </div>
            <button type="submit" class="btn btn-success" name="bulanan" style="float: right;">Lihat Laporan</button>
        </form>
    </div>
</div>
