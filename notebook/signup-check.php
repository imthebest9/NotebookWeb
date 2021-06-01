<!--// Link data to sign up-->

<?php
session_start();
include 'db_conn.php';
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['re_password']) && isset($_POST['g-recaptcha-response'])){

    $secret='6LcGgwQbAAAAAA0Ht4gdh4bjU-kUbOS5XdTOXgLG';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='. $secret. '&response='. $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    $user_data = 'name'.$name. '&email='. $email;

    if(empty($name)){
        header("Location: signup.php?error=Name is required&$user_data");
        // Location: signup.php?error=Email is required&$user_data"
    } else if(empty($email)){
        header("Location: signup.php?error=Email is required&$user_data");
    } else if(empty($password)){
        header("Location: signup.php?error=Password is required&$user_data");
    } else if(empty($re_password)){
        header("Location: signup.php?error=Repeat Password is required&$user_data");
    } else if($password != $re_password){
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
    }
    else{
        if($responseData->success){
            // hash the password
            $password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
            $stmt->execute([$email]);

            if($stmt->rowCount() >= 1){
                header("Location: signup.php?error=The email has already been registered&$user_data");
            }else {
                $sql = "INSERT INTO users(full_name, email, password) VALUES('$name', '$email', '$password')";
                $conn->exec($sql);
                header("Location: signup.php?success=Your account has been created successfully&$user_data");
            }
        }
        else header("Location: signup.php?error=The recaptcha failed&$user_data");
    }
}

