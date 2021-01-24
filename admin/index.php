<?php
    session_start();
    include '../include/config.php';
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
    $foto = $_SESSION['foto'];
    $id_kar1 = $_SESSION['id_kar'];

    $sql = mysqli_query($db, "SELECT * FROM karyawan WHERE id_kar = '$id_kar1' ");
    $getting = mysqli_fetch_array($sql);

    if ($role!="admin") {
        echo "
            <script>
                alert('Silahkan login dulu');
                window.location.href = '../index.php'
            </script>
        ";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Rumah Makan 88</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container container-wrapper">
        <div class="row">
          <div class="col-md-4">
          	<img src="../img/karyawan_img/<?= $foto=$getting['foto']; ?>" class="rounded img-responsive" style="width: 100px; height: 100px; margin: 0px 20px; float: left; box-shadow: 0px 0px 3px black;">
          	<h2 class="text-capitalize">
          		Welcome <?= $username;?>
          	</h2>
            <p>Online</p>
          	<div class="list-group" style="clear: both; position: relative; left: 15px; top: 10px;">
          	  <a href="index.php" class="list-group-item list-group-item-action">Home</a>
          	  <a href="?page=karyawan/karyawan.php" class="list-group-item list-group-item-action">Data Karyawan</a>
              <a href="?page=laporan/laporan.php" class="list-group-item list-group-item-action">Laporan</a>
          		<a href="?page=user/user.php" class="list-group-item list-group-item-action">User Setting</a>
          	  <a href="logout.php" class="list-group-item list-group-item-action">Logout</a>
          	</div>

          </div>
            <?php
                if ($_GET) {
                    $page=$_GET['page'];
                    include 'include/'.$page;
                } else {
                    include 'include/content.php';
                }
            ?>
        </div>

        <div class="col-md-12 text-center mt-5">
          <p>2020 All Reserved By WARUNG 88</p>
        </div>
    </div>



    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
