<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Makan 88</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container container-wrapper">
        <div class="row">
            <?php
                if ($_GET) {
                    $page=$_GET['page'];
                    include 'include/'.$page;
                } else {
                    include 'include/home.php';
                }
            ?>
        </div>

        <div class="col-md-12 text-center mt-5">
          <p>2020 All Reserved By WARUNG 88</p>
        </div>
    </div>



    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">

       function change(id)
       {
          var cname=document.getElementById(id).className;
          var ab=document.getElementById(id+"_hidden").value;
          document.getElementById(cname+"rating").value=ab;

          for(var i=ab;i>=1;i--)
          {
             document.getElementById(cname+i).src="img/star2.png";
          }
          var id=parseInt(ab)+1;
          for(var j=id;j<=5;j++)
          {
             document.getElementById(cname+j).src="img/star1.png";
          }
       }

      </script>
</body>

</html>
