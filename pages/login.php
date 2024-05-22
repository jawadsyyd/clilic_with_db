<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <div class="container mt-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Log in</h3>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="form-group mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter password" required>
                                <div class="float-end"><a href="" style="text-decoration:none">Forget password?</a>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary" name="submit">Login</button>
                            </div>
                        </form>
                        <?php
    $username = 'root';
    $password = '';
    $database = new PDO('mysql:host=localhost;dbname=clinicdb;',$username,$password);
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = $database->prepare("SELECT * FROM users WHERE Username=:username && Password=:password");
        $login->bindParam("username",$username);
        $login->bindParam("password",$password);
        $login->execute();
        if($login->rowCount()>0){
            header("Location: http://localhost/server/gomedic/pages/home.php/#appointmentForm");
        }
        else{
            echo '<div class="" style="font-size:14px"><div class="alert alert-danger d-flex align-items-center" role="alert">
            <div>
              Wrong email or password.Try again or click \'Forget password\' to reset it.
            </div>
          </div></div>';
        }
    }
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>