<?php
    session_start();
    include 'include/config.php';

    if ($_POST) {

        $user = mysqli_real_escape_string($db, $_POST['user']);
        $pass = mysqli_real_escape_string($db, $_POST['pass']);

        $sql = "SELECT * FROM user WHERE username='$user' AND password='$pass'";
        $query = mysqli_query($db, $sql);

        $cek = mysqli_num_rows($query);

        if ($cek >= 0) {

            $ambil = mysqli_fetch_array($query);
            $id_user = $ambil['id_user'];
            $id_kar1 = $ambil['id_kar'];
            $username = $ambil['username'];
            $role = $ambil['role'];

            $_SESSION['id_user'] = $id_user;
            $_SESSION['id_kar'] = $id_kar1;
            $_SESSION['role'] = $role;
            $_SESSION['username'] = $username;
            $_SESSION['foto'] = $foto;

            if ($role == "admin") {
                echo "
                    <script>
                        alert('Selamat Datang Admin');
                        window.location.href = 'admin/index.php'
                    </script>
                ";
            } else {
                echo "
                        <script>
                            alert('Status tidak ada di system kami!!');
                            window.location.href = '?page=login/login.php'
                        </script>
                    ";
            }

        }

    }
