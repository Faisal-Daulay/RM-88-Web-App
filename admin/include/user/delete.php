<?php

  include '../include/config.php';

  $id = $_GET['id'];

  $hapus = mysqli_query($db, "DELETE FROM user WHERE id_user ='$id' ");

  echo "
      <script>
          alert('Delete Data Success');
          window.location.href = '?page=user/user.php'
      </script>
  ";
