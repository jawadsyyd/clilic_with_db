<?php
$username = 'root';
$servername = "localhost";
$password = '';
$dbname = "clinicdb";
$database = new PDO('mysql:host=localhost;dbname=clinicdb;', $username, $password);
$conn = new mysqli($servername, $username, $password, $dbname);
?>

<?php
$id = $_GET['updateid'];
$select = "SELECT * FROM doctors WHERE Doctor_id=$id";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
$fName = $row['FName'];
$lName = $row['LName'];
$licenseNb = $row['License_number'];
$phoneNb = $row['Phone_number'];
$speciality = $row['Speciality'];
if (isset($_POST['submit'])) {
    $update = $database->prepare("UPDATE doctors SET
                Doctor_id=$id,
                FName =:FName,
                LName =:LName,
                Speciality =:Speciality,
                License_number =:License_number,
                Phone_number =:Phone_number
                WHERE Doctor_id=$id");

    $update->bindParam("FName", $_POST['doctorFirstName']);
    $update->bindParam("LName", $_POST['doctorLastName']);
    $update->bindParam("Speciality", $_POST['doctorSpeciality']);
    $update->bindParam("License_number", $_POST['doctorLicenseNumber']);
    $update->bindParam("Phone_number", $_POST['doctorPhoneNumber']);
    if ($update->execute()) {
        echo '<div class="alert alert-success" role="alert">
                            A simple success alert—check it out!
                        </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                            A simple success alert—check it out!
                        </div>';
    }
    header('location:doctors.php');
}
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

<body class="my-5 mx-5">
    <div class="container-fluid border" style="border-radius: 10px; background-color: rgb(188, 227, 226);">
        <h1 class="mt-3 text-center">Update Doctor</h1>
        <form id="doctorForm" method="POST">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="doctorFirstName" class="form-label fw-semibold">First Name:</label>
                        <input type="text" class="form-control" id="doctorFirstName" name="doctorFirstName" value=<?php echo $fName; ?>>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="doctorLastName" class="form-label fw-semibold">Last Name:</label>
                        <input type="text" class="form-control" id="doctorLastName" name="doctorLastName" value=<?php echo $lName; ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="doctorLicenseNumber" class="form-label fw-semibold">License Number:</label>
                        <input type="text" class="form-control" id="doctorLicenseNumber" name="doctorLicenseNumber"
                            value=<?php echo $licenseNb; ?>>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="doctorPhoneNumber" class="form-label fw-semibold">Phone Number:</label>
                        <input type="tel" class="form-control" id="doctorPhoneNumber" name="doctorPhoneNumber"
                            value=<?php echo $phoneNb; ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="doctorSpeciality" class="form-label fw-semibold">Speciality:</label>
                        <input type="text" class="form-control" id="doctorSpeciality" name="doctorSpeciality"
                            value=<?php echo $speciality; ?>>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary" id="update">Update Doctor</button>
            </div>
        </form>
    </div>
</body>

</html>