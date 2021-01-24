<?php

  include '../include/config.php';

  if ($_POST) {

    $nama = mysqli_real_escape_string($db, $_POST['nama']);
    $alamat = mysqli_real_escape_string($db, $_POST['alamat']);
    $notel = mysqli_real_escape_string($db, $_POST['notel']);
    $role1 = mysqli_real_escape_string($db, $_POST['role1']);

    $lokasi_file = $_FILES['uplaod']['tmp_name'];
    $tipe_file   = $_FILES['uplaod']['type'];
    $nama_file   = $_FILES['uplaod']['name'];
    $size        = $_FILES['uplaod']['size'];
    $direktori   = "../img/karyawan_img/$nama_file";

    if ($nama!="") {

      move_uploaded_file($lokasi_file, $direktori);
      $sql = mysqli_query($db, "INSERT INTO karyawan (nama, alamat, notel, foto) VALUES ('$nama', '$alamat', '$notel', '$nama_file') ");

      $id_kar = mysqli_insert_id($db);

      $sql1 = mysqli_query($db, "INSERT INTO user (id_kar, username, password, role) VALUES ('$id_kar', '', '', '$role1') ");

        echo "
            <script>
                alert('Insert Data Success');
                window.location.href = '?page=karyawan/karyawan.php'
            </script>
        ";
    } else {

          echo "
              <script>
                  alert('Insert Data Failed');
                  window.location.href = '?page=karyawan/form.php'
              </script>
          ";
    }
  }
