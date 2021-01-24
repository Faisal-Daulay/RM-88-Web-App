<?php

  include 'include/config.php';

    if ($_POST) {

      $kebersihan = $_POST['kebersihan'];
      $id_kar = $_POST['id_kar'];
      $kerapian = $_POST['kerapian'];
      $pelayanan = $_POST['pelayanan'];
      $keramahan= $_POST['keramahan'];
      $napeng = $_POST['napeng'];
      $no_struk = $_POST['no_struk'];
      $komentar = $_POST['komentar'];

      $_SESSION['napeng'] = $napeng;
      $_SESSION['no_struk'] = $no_struk;
      $tgl = date('Y-m');


        $sql = mysqli_query($db, "INSERT INTO ratingkami (id_kar, tgl, kebersihan, kerapian, pelayanan, keramahan, nama_customer, no_struk, komentar) VALUES ('$id_kar', '$tgl', '$kebersihan', '$kerapian', '$pelayanan', '$keramahan', '$napeng', '$no_struk', '$komentar') ");

        echo "
            <script>
                alert('Terima kasih karena telah melakukan penilaian terhadap kinerja kami');
                window.location.href = '?page=nilai/penilaian.php'
            </script>
        ";

    }
