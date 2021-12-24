<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/global/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/admin/css/login-admin.css">
    <title>Point of Sale</title>
</head>

<body>
    <div class="container">
        <form action="login-act.php" method="post">
            <div class="col-md-4 panel mx-auto">
                <div class="border border-light" id="border">
                    <h3 style="text-align:center; ">Login</h3>
                    <div class="form-group top">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group bottom">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "<div style='margin-top:5%' class='alert alert-danger' role='alert'></span>  Login Gagal !! Username atau Password Salah !!</div>";
                    }
                }
                ?>
            </div>
        </form>
    </div>

</body>
<script src="./assets/global/js/jquery-3.3.1.slim.min.js"></script>
<script src="./assets/global/js/popper.min.js"></script>
<script src="./assets/global/js/bootstrap.min.js"></script>

</html>