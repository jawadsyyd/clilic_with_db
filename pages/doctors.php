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
    <h1 class="pb-3 text-center">Add Doctor</h1>
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
            <input type="text" class="form-control" id="doctorLicenseNumber" name="doctorLicenseNumber" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="doctorPhoneNumber" class="form-label fw-semibold">Phone Number:</label>
            <input type="tel" class="form-control" id="doctorPhoneNumber" name="doctorPhoneNumber" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="doctorSpecialty" class="form-label fw-semibold">Speciality:</label>
            <input type="text" class="form-control" id="doctorSpecialty" name="doctorSpecialty" required>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">Add Doctor</button>
      </div>
    </form>
  </div>

  <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>License Number</th>
          <th>Phone Number</th>
          <th>Speciality</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $data = "SELECT * FROM doctors";
        $result = $database->query($data);

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['FName'] . "</td>";
                echo "<td>" . $row['LName'] . "</td>";
                echo "<td>" . $row['Liscense_number'] . "</td>";
                echo "<td>" . $row['Phone_number'] . "</td>";
                echo "<td>" . $row['Speciality'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No doctors found</td></tr>";
        }
        ?>
        </tbody>
    </table>

</body>
</html>

<?php

    if (isset($_POST['submit'])) {

        $insert = $database->prepare('INSERT INTO doctors (FName, LName, Liscense_number, Phone_number, Speciality) 
            VALUES(:FName, :LName, :Liscense_number, :Phone_number, :Speciality)');
    
        $insert->bindParam('FName', $_POST['doctorFirstName']);
        $insert->bindParam('LName', $_POST['doctorLastName']);
        $insert->bindParam('Liscense_number', $_POST['doctorLicenseNumber']);
        $insert->bindParam('Phone_number', $_POST['doctorPhoneNumber']);
        $insert->bindParam('Speciality', $_POST['doctorSpecialty']);
        $insert->execute();
    }

?>