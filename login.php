<?php
    session_start();
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--  This is the first UI for user to login with email and password. -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Best Notebook Ever Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="p-5 rounded shadow" style="width: 30rem" action="auth.php" method="post">
            <h1 class="text-center pb-5 display-4">LOGIN</h1>
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
                <?=htmlspecialchars($_GET['error']) ?>
            </div>
            <?php } ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" value="<?php if(isset($_GET['email']))echo (htmlspecialchars($_GET['email']));?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">LOGIN</button>
            <a href="signup.php" class="float-end" >Create an account</a>
        </form>
    </div>
</body>
</html>
        <?php
    }else{
        header("Location: login.php");
    }
?>
