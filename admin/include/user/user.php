<div class="col-md-8">
    <h2 class="text-center text-uppercase">
        Data User
    </h2>
    <div class="table-responsive" style="width: 730px;">
        <table class="table table-bordered table-hover table-light">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  include '../include/config.php';

                  $mysql = mysqli_query($db, "SELECT * FROM user WHERE username='$username'");
                  $no=1;
                  while ($ambil = mysqli_fetch_array($mysql)) {
                    $id_user = $ambil['id_user'];
                    $user = $ambil['username'];
                    $pass = $ambil['password'];
                    $role1 = $ambil['role'];

                ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $user; ?></td>
                    <td><?= $pass; ?></td>
                    <td class="text-capitalize"><?= $role1; ?></td>
                    <td>
                      <a href="?page=user/form.php&id=<?= $id_user; ?>" class="btn btn-primary">Edit Data</a>
                    </td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
    </div>
</div>
