<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/png" href="images/syria.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="giris.css">
    <title>Kaydol</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];


         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>bu e-posta kullanıldı başka birini deneyin lütfen!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>geri dön</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error Occured");

            echo "<div class='message'>
                      <p>kayıt başarıyla tamamlandı!</p>
                  </div> <br>";
            echo "<a href='giris.php'><button class='btn'>giriş yap</button>";
         

         }

         }else{
         
        ?>

            <header>Kaydol</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Kullanıcı adı</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">E-posta</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Yaş</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Şifre</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="kaydol" required>
                </div>
                <div class="links">
                    Hesabın var mı? <a href="giris.php">Giriş yap</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>