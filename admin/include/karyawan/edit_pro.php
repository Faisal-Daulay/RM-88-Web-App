<?php

  include '../include/config.php';

  if ($_POST) {

    $id = mysqli_real_escape_string($db, $_POST['id']);
    $nama = mysqli_real_escape_string($db, $_POST['nama']);
    $alamat = mysqli_real_escape_string($db, $_POST['alamat']);
    $notel = mysqli_real_escape_string($db, $_POST['notel']);
    $jabatan1 = mysqli_real_escape_string($db, $_POST['role1']);

    $lokasi_file = $_FILES['uplaod']['tmp_name'];
    $tipe_file   = $_FILES['uplaod']['type'];
    $nama_file   = $_FILES['uplaod']['name'];
    $size        = $_FILES['uplaod']['size'];
    $direktori   = "../img/karyawan_img/$nama_file";

    if ($nama!="") {

      move_uploaded_file($lokasi_file, $direktori);
      $sql = mysqli_query($db, "UPDATE karyawan SET nama = '$nama',
                                                    alamat = '$alamat',
                                                    notel = '$notel',
                                                    foto = '$nama_file'
                                                    WHERE karyawan.id_kar = '$id' ");

      $sql1 = mysqli_query($db, "UPDATE user SET role ='$jabatan1' WHERE id_kar ='$id' ");

        echo "
            <script>
                alert('Update Data Success');
                window.location.href = '?page=karyawan/karyawan.php'
            </script>
        ";
    } else {

          echo "
              <script>
                  alert('Update Data Failed');
                  window.location.href = '?page=karyawan/form.php&id=$id'
              </script>
          ";
    }
  }
