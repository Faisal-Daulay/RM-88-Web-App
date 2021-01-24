<?php

    include '../include/config.php';

    if ($_POST) {
      $user = $_POST['user'];
      $id = $_POST['id'];
      $pass = $_POST['pass'];
      $role1 = $_POST['role1'];

      $sql = mysqli_query($db, "UPDATE user SET username = '$user',
                                                password = '$pass',
                                                role     = 'admin'
                                                WHERE id_user = '$id' ");

      echo "
          <script>
              alert('Update Data Success');
              window.location.href = '?page=user/user.php'
          </script>
      ";
    }
