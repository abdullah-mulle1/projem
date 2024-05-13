<?php 
   session_start();

   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: giris.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/png" href="images/syria.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="giris.css">
    <title>Ana sayfa</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="index.html"> YAZAN </a> </p>
        </div>

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }
            
            echo "<a href='degistir.php?Id=$res_id'>Profili değiştir</a>";
            ?>

            <a href="cikis.php"> <button class="btn">Çıkış yap</button> </a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p> Merhaba <b><?php echo $res_Uname ?></b> Hoş Geldiniz </p>
            </div>
            <div class="box">
                <p> E-postanız: <b><?php echo $res_Email ?></b></p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p> Siz <b><?php echo $res_Age ?> Yaşındasınız </b></p> 
            </div>
          </div>
       </div>

    </main>
</body>
</html>