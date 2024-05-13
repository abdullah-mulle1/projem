<?php

$name = $_POST ['uname'];
$phone = $_POST ['uphone'];
$email = $_POST ['uemail'];
$message = $_POST['umessage'];

    echo "<h1> Formu doldurduğunuz için teşekkür ederim :) </h1>";

    echo "<p> Adınız: $name </p>";
    echo "<p> Telefon numaranız: $phone </p>";
    echo "<p> E-postanız: $email </p>";
    echo "<p> Mesajınız: $message </p>";

?>