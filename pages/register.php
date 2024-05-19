<?php
    $username = 'root';
    $password = '';
    $database = new PDO('mysql:host=localhost;dbname=clinicdb;',$username,$password);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .awm {
        display: grid;
        justify-content: center;
        align-items: center;
        margin-block: 7rem;
    }
    </style>
</head>

<body>
    <div class="awm mx-3">
        <div class="container-fluid bg-dark text-light py-3">
            <header class="text-center">
                <h1 class="display-6">Register</h1>
            </header>
        </div>
        <section class="container py-3">
            <form class="row g-3" method="POST">
                <div class="col-6 col-md-3">
                    <label for="inputFname4" class="form-label">First name</label>
                    <input type="text" name="fname" class="form-control" id="fname" require>
                </div>
                <div class="col-6 col-md-3">
                    <label for="inputLname4" class="form-label">Last name</label>
                    <input type="text" name="lname" class="form-control" id="lname" require>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" require>
                </div>
                <div class="col-6 col-md-4">
                    <label for="inputUsernamr4" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" require>
                </div>
                <div class="col-6 col-md-4">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" require>
                </div>
                <div class="col-4 col-md-4">
                    <label for="inputRole" class="form-label">Role</label>
                    <select id="role" name="role" class="form-select" require>
                        <option selected value="Patient">Patient</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <!--  -->
                <div class="col-8 col-md-3">
                    <label for="inputDate4" class="form-label ldob">Date of birthday</label>
                    <input type="date" name="dob" class="form-control" id="dob" require>
                </div>

                <div class="col-4 col-md-3">
                    <label for="inputGender" class="form-label lgender">Gender</label>
                    <select id="gender" name="gender" class="form-select" require>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div class="col-4 col-md-3">
                    <label for="inputPhnb4" class="form-label lphone">Phone number</label>
                    <input type="tel" name="phone" class="form-control" id="phone" require>
                </div>

                <div class="col-4 col-md-3">
                    <label for="inputEph4" class="form-label lemergency">Emergency contact</label>
                    <input type="tel" name="emrgencyPhone" class="form-control" id="emrgencyPhone">
                </div>
                <!--  -->
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-dark px-3">Sign in</button>
                </div>
            </form>
        </section>
    </div>
    <script src="../js/registration.js"></script>
</body>

</html>
<?php

if(isset($_POST['submit'])){
$emailcheck = $database->prepare('SELECT email FROM patients WHERE email = :email');
$emailcheck->bindParam(':email',$_POST['email']);
$emailcheck->execute();
if($emailcheck->rowCount()>0){

}else{
    $insert = $database->prepare('INSERT INTO 
    patients(FName,LName,Date_of_birth,Phone_number,Email,Emergency_contact,Patient_sex)
    VALUES(:FName,	:LName,	:Date_of_birth,	:Phone_number	,:Email	,:Emergency_contact	,:Patient_sex)
    ');
    $insert->bindParam('FName',$_POST['fname']);
    $insert->bindParam('LName',$_POST['lname']);
    $insert->bindParam('Date_of_birth',$_POST['dob']);
    $insert->bindParam('Phone_number',$_POST['phone']);
    $insert->bindParam('Email',$_POST['email']);
    $insert->bindParam('Emergency_contact',$_POST['emrgencyPhone']);
    $insert->bindParam('Patient_sex',$_POST['gender']);
    $insert->execute();

    $insertUser = $database->prepare('INSERT INTO 
    users(Username,Password,UserType,FName,LName/*,Email,P_id*/)
    VALUES(:username,:password,:role,:fname,:lname,:email/*,:patientId*/)
    ');
    $insertUser->bindParam('username',$_POST['username']);
    $insertUser->bindParam('password',$_POST['password']);
    $insertUser->bindParam('role',$_POST['role']);
    $insertUser->bindParam('fname',$_POST['fname']);
    $insertUser->bindParam('lname',$_POST['lname']);
    $insertUser->bindParam('email',$_POST['email']);
    // $patientId = $_POST['submit'];
    // $insertUser->bindParam('patientId',$patientId);
    $insertUser->execute();
}
}else{

}

?>