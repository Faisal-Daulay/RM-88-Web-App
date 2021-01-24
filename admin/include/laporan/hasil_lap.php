<link rel="stylesheet" href="../../../css/bootstrap.min.css">
<div class="container mt-3">
<?php
 // Koneksi

 include '../../../include/config.php';
 $date = $_POST['start'];

 $explode = explode('-', $date);
 $month = $explode[1];
 $month = date('F');

 //Buat array bobot { C1 = 35%; C2 = 25%; C3 = 25%; dan C4 = 15%.}
 $bobot = array(0.30,0.30,0.20,0.20);

 //Buat fungsi tampilkan nama
 function getNama($id){
  include '../../../include/config.php';

  $q = mysqli_query($db, "SELECT * FROM karyawan where id_kar = '$id'");
  $d = mysqli_fetch_array($q);
  return $d['nama'];
 }

 //Setelah bobot terbuat select semua di tabel Matrik
 $sql = mysqli_query($db, "SELECT * FROM ratingkami WHERE tgl='$date'  ");
 //Buat tabel untuk menampilkan hasil
 echo "
 <table hidden class='table table-bordered table-hover table-light' width=500 style='border:1px; #ddd; solid; border-collapse:collapse' border=1>
  <tr>
   <th>No</th>
   <th>Nama</th>
   <th>C1</th>
   <th>C2</th>
   <th>C3</th>
   <th>C4</th>
   <th>Total Poin</th>
  </tr>
  ";
 $no = 1;
 while ($dt = mysqli_fetch_array($sql)) {
  $jumlah= ($dt['kebersihan'])+($dt['kerapian'])+($dt['pelayanan'])+($dt['keramahan']);
  echo "<tr>
   <td>$no</td>
   <td>".getNama($dt['id_kar'])."</td>
   <td>$dt[kebersihan]</td>
   <td>$dt[kerapian]</td>
   <td>$dt[pelayanan]</td>
   <td>$dt[keramahan]</td>
   <td>$jumlah</td>
  </tr>";
 $no++;
 }
 echo "</table>";

 //Lakukan Normalisasi dengan rumus pada langkah 2
 //Cari Max atau min dari tiap kolom Matrik
 $crMax = mysqli_query($db, "SELECT max(kebersihan) as maxK1,
                                    max(kerapian) as maxK2,
                                    max(pelayanan) as maxK3,
                                    max(keramahan) as maxK4
                                    FROM ratingkami");
 $max = mysqli_fetch_array($crMax);

 //Hitung Normalisasi tiap Elemen
 $sql2 = mysqli_query($db, "SELECT * FROM ratingkami WHERE tgl='$date'");
 //Buat tabel untuk menampilkan hasil
 echo "
 <table hidden class='table table-bordered table-hover table-light' width=500 style='border:1px; #ddd; solid; border-collapse:collapse' border=1>
  <tr>
   <th>No</th>
   <th>Nama</th>
   <th>C1</th>
   <th>C2</th>
   <th>C3</th>
   <th>C4</th>
  </tr>
  ";
 $no = 1;
 while ($dt2 = mysqli_fetch_array($sql2)) {
  echo "<tr>
   <td>$no</td>
   <td>".getNama($dt2['id_kar'])."</td>
   <td>".round($dt2['kebersihan']/$max['maxK1'],2)."</td>
   <td>".round($dt2['kerapian']/$max['maxK2'],2)."</td>
   <td>".round($dt2['pelayanan']/$max['maxK3'],2)."</td>
   <td>".round($dt2['keramahan']/$max['maxK4'],2)."</td>
  </tr>";
 $no++;
 }
 echo "</table>";

 //Proses perangkingan dengan rumus langkah 3
 $sql3 = mysqli_query($db, "SELECT id_kar, SUM(kebersihan) as bersih, SUM(kerapian) as kerap, SUM(pelayanan) as pelayan, SUM(keramahan) as ramah, tgl FROM `ratingkami` WHERE tgl = '$date' GROUP BY id_kar");
 //Buat tabel untuk menampilkan hasil
 echo "<h2 class='text-center'>Perangkingan Pada Bulan $month</h2>
 <table class='table table-bordered table-hover table-light' width=500 style='border:1px; #ddd; solid; border-collapse:collapse' border=1>
  <tr>
   <th>no</th>
   <th>Nama</th>
   <th>Total Bintang</th>
   <th>SAW</th>
   <th>Rangking</th>
  </tr>
  ";

//Kita gunakan rumus (Normalisasi x bobot)
 while ($dt3 = mysqli_fetch_array($sql3)) {
  $jumlah= ($dt3['bersih'])+($dt3['kerap'])+($dt3['pelayan'])+($dt3['ramah']);
  $poin= round(
   (($dt3['bersih']/$max['maxK1'])*$bobot[0])+
   (($dt3['kerap']/$max['maxK2'])*$bobot[1])+
   (($dt3['pelayan']/$max['maxK3'])*$bobot[2])+
   (($dt3['ramah']/$max['maxK4'])*$bobot[3]),3);

  $data[]=array('nama'=>getNama($dt3['id_kar']),
      'jumlah'=>$jumlah,
      'poin'=>$poin);

 }

//mengurutkan data
   foreach ($data as $key => $isi) {
    $nama[$key]=$isi['nama'];
    $jlh[$key]=$isi['jumlah'];
    $poin1[$key]=$isi['poin'];
   }
   array_multisort($poin1,SORT_DESC,$jlh,SORT_DESC,$data);
   $no=1;
   $h="Juara";
   $juara=1;
   $hr=1;

   foreach ($data as $item) { ?>
   <tr>
   <td><?php echo $no ?></td>
   <td><?php echo$item['nama'] ?></td>
   <td><?php echo$item['jumlah'] ?> Bintang </td>
   <td><?php echo$item['poin'] ?></td>
   <td><?php echo"$h $juara" ?></td>
   </tr>
   <?php
   $no++;
   if ($no>=4) {
    $h="  ";
    $juara=" ";
   }else{
    $juara++;
   }

   }
   echo "</table>";

?>
</div>
