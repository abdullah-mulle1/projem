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
    <title>Profili değiştir</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="anasayfa.php"> YAZAN </a></p>
        </div>

        <div class="right-links">
            <a href="#">Profili değiştir</a>
            <a href="cikis.php"> <button class="btn">Çıkış yap</button> </a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', Age='$age' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>profil güncellendi!</p>
                </div> <br>";
              echo "<a href='anasayfa.php'><button class='btn'>ana sayfaya dön</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                }

            ?>
            <header>Profili değiştir</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Kullanıcı adı</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">E-posta</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Yaş</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" autocomplete="off" required>
                </div>
                
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="güncelleyin" required>
                </div>
                
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>