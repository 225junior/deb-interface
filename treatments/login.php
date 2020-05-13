<?php
$email = $password = '';

if (isset($_POST["btn_validate"])) {
    if (isset($_POST['password']) && isset($_POST['email'])) {
        
        echo 'All done !';

    }else {
        echo 'something wrong on passwrd or email';

    }
//     $password = trim(htmlspecialchars($_POST['password']));
//     $email = $_POST['email'];
//     echo( $email. ' ' .$password);
}else {
    echo 'something wrong on btn_validate!';

}
