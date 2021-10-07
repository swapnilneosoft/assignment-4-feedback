<?php
$err = [];
$succErr;

if (isset($_POST['submit'])) {

    $err = [];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        array_push($err, "Both fields are required !");
    } elseif (!empty($email) && !empty($password)) {
        if ($email == 'test_user') {
            if ($password == '123456') {
                session_start();
                $_SESSION["user"]= $email;
                header("Location: http://localhost/training/assignment/assignment4/welcome.php");
            } else {
                array_push($err, "Password is incorrect !");
            }
        } else {
            array_push($err, "Email is incorrect !");
        }
    } else {
        array_push($err, "Something went wrong . Please try again later !");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <?php include('nav.php') ?>
    <div class="container " style="margin-top:120px">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 card p-0">
                    <div class="card-header text-center bg-white ">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group p-3 mt-2">
                            <button class="btn btn-success form-control" name="submit">Login</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
        <div class="row" id="alertDiv">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-4">
                <?php
                if (!empty($err)) {
                    foreach ($err as $ele) {
                        echo "
                    <div class='alert alert-danger' role='alert'>
                    $ele
                    </div>
                    ";
                    }
                }
                if (!empty($succErr) ) {
                    echo "
                    <div class='alert alert-danger' role='alert'>
                    $succErr 
                    </div>
                    ";
                }

                ?>
            </div>
        </div>
    </div>

    <script src="./js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#alertDiv').fadeOut(3000);
            }, 3000);
        });
    </script>
</body>

</html>