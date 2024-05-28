<?php
    $username = 'root';
    $password = '';
    $database = new PDO('mysql:host=localhost;dbname=clinicdb;',$username,$password);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
</head>

<body class="mx-5 my-5">
    <div class="container-fluid border" style="border-radius: 10px; background-color: rgb(188, 227, 226);">
        <h1 class="mt-3 text-center">Add Doctor</h1>
        <form id="doctorForm" method="POST">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="doctorFirstName" class="form-label fw-semibold">First Name:</label>
                        <input type="text" class="form-control" id="doctorFirstName" name="doctorFirstName" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="doctorLastName" class="form-label fw-semibold">Last Name:</label>
                        <input type="text" class="form-control" id="doctorLastName" name="doctorLastName" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="doctorLicenseNumber" class="form-label fw-semibold">License Number:</label>
                        <input type="text" class="form-control" id="doctorLicenseNumber" name="doctorLicenseNumber"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="doctorPhoneNumber" class="form-label fw-semibold">Phone Number:</label>
                        <input type="tel" class="form-control" id="doctorPhoneNumber" name="doctorPhoneNumber" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="doctorSpeciality" class="form-label fw-semibold">Speciality:</label>
                        <input type="text" class="form-control" id="doctorSpeciality" name="doctorSpeciality" required>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary" id="submit">Add Doctor</button>
            </div>

            <?php

if (isset($_POST['submit'])) {

    $insert = $database->prepare("INSERT INTO doctors (FName, LName, Speciality, License_number, Phone_number) 
        VALUES(:FName, :LName, :Speciality,:License_number, :Phone_number)");

    $insert->bindParam('FName', $_POST['doctorFirstName']);
    $insert->bindParam('LName', $_POST['doctorLastName']);
    $insert->bindParam('License_number', $_POST['doctorLicenseNumber']);
    $insert->bindParam('Phone_number', $_POST['doctorPhoneNumber']);
    $insert->bindParam('Speciality', $_POST['doctorSpeciality']);
    $insert->execute();
}
?>
        </form>
    </div>
    <table class="table table-success  table-striped-columns table-bordered mt-3 text-center" id="doctorInfo">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>License Number</th>
                <th>Phone Number</th>
                <th>Speciality</th>
                <th>******</th>
            </tr>
        </thead>
        <?php
$data = "SELECT * FROM doctors";
$result = $database->query($data);
if ($result->rowCount() > 0) {
  foreach ($result as $doctor) {
    echo"<tbody>";
    echo "<tr id='newTr'>";
    echo "<td>" . $doctor['Doctor_id'] . "</td>";
    echo "<td>" . $doctor['FName'] . "</td>";
    echo "<td>" . $doctor['LName'] . "</td>";
    echo "<td>" . $doctor['License_number'] . "</td>";
    echo "<td>" . $doctor['Phone_number'] . "</td>";
    echo "<td>" . $doctor['Speciality'] . "</td>";
    echo "<td><form method='post'><button onclick='setButtonId(this.id)' id='" . $doctor['Doctor_id'] . "' class='btn update-btn btn-warning btn-sm' name='update'>Update</button> ";
    echo " <button onclick='setButtonId(this.id)' id='" . $doctor['Doctor_id'] . "' class='btn delete-btn btn-danger btn-sm' name='delete'>Delete</button></form></td>";
    echo "</tr>";
    echo"</tbody>";
  }
}
else {
  echo "<tr><td colspan='7'>No doctors found</td></tr>";
}
?>
    </table>
    <script src="../js/doctors.js"></script>
</body>

</html>
<?php
if(isset($_POST['update'])){

    $buttonId = $_POST["update"];

    $update = $database->prepare("UPDATE doctors SET
        FName =:FName,
        LName =:LName,
        Speciality =:Speciality,
        License_number =:License_number,
        Phone_number =:Phone_number WHERE
        Doctor_id=:Doctor_id
    ");
    
    $update->bindParam("FName",$_POST['doctorFirstName']);
    $update->bindParam("LName",$_POST['doctorLastName']);
    $update->bindParam("Speciality",$_POST['doctorSpeciality']);
    $update->bindParam("License_number",$_POST['doctorLicenseNumber']);
    $update->bindParam("Phone_number",$_POST['doctorPhoneNumber']);
    $update->bindParam("Doctor_id",$buttonId);
    if($update->execute()){
        echo '<div class="alert alert-success" role="alert">
        A simple success alert—check it out!
      </div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">
        A simple success alert—check it out!
      </div>';
    }
}
if(isset($_POST["delete"])){
    $buttonId = $_POST["delete"];
    $delete = $database->prepare("DELETE FROM doctors WHERE Doctor_id=:Doctor_id");
    $delete->bindParam("Doctor_id",$buttonId);
    if($delete->execute()){
        echo '<div class="alert alert-success" role="alert">
        A simple success alert—check it out!
      </div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">
        A simple success alert—check it out!
      </div>';
    }
}
?>