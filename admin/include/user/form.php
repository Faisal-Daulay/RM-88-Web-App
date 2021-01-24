<div class="col-md-8">
    <h2 class="text-center text-uppercase">
        Setting User
    </h2>
    <div class="col-md-5 mt-5" style="position: ralative; left: 50%; transform: translate(-50%);">
        <?php
          include '../include/config.php';

          $id = $_GET['id'];
          $mysql = mysqli_query($db, "SELECT * FROM user WHERE username='$username'");
          $no=1;
          while ($ambil = mysqli_fetch_array($mysql)) {
            $id_user = $ambil['id_user'];
            $user = $ambil['username'];
            $pass = $ambil['password'];
            $role1 = $ambil['role'];
        ?>
        <form action="?page=user/proses.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="user" class="form-control" value="<?= $username; ?>">
                <input type="hidden" name="id" value="<?= $id; ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" class="form-control" value="<?= $pass; ?>">
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Update Data</button>
        </form>
      <?php } ?>
    </div>
</div>
