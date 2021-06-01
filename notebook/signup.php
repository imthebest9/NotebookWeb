<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIGN UP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="p-5 rounded shadow" style="width: 30rem" action="signup-check.php" method="post">
            <h1 class="text-center pb-5 display-4">SIGN UP</h1>
            <?php if(isset($_GET['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                    <?=htmlspecialchars($_GET['error']) ?>
                </div>
            <?php } ?>

            <?php if(isset($_GET['success'])){ ?>
                <div class="alert alert-success" role="alert">
                    <?=htmlspecialchars($_GET['success']) ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label for="exampleName1" class="form-label">Name</label>
                <input type="text" name="name" value="<?php if(isset($_GET['name']))echo (htmlspecialchars($_GET['name']));?>" class="form-control" id="exampleName1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" value="<?php if(isset($_GET['email']))echo (htmlspecialchars($_GET['email']));?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputRePassword1" class="form-label">Repeat Password</label>
                <input type="password" name="re_password" class="form-control" id="exampleInputRePassword1">
            </div>
            <div class="g-recaptcha" data-sitekey="6LcGgwQbAAAAAA903uZagSzBMA3qhZGiJXVQ4hAj"></div>
            <br>
            <button type="submit" class="btn btn-primary">SIGN UP</button>
            <a href="login.php" class="float-end" >Already have an account?</a>

        </form>
    </div>
</body>
</html>
