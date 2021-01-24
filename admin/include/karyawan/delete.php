<?php

  include '../include/config.php';

  $id = $_GET['id'];

  $hapus = mysqli_query($db, "DELETE FROM karyawan WHERE id_kar ='$id' ");

  echo "
      <script>
          alert('Delete Data Success');
          window.location.href = '?page=karyawan/karyawan.php'
      </script>
  ";
