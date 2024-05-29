<?php
$username = 'root';
$password = '';
$database = new PDO('mysql:host=localhost;dbname=clinicdb;', $username, $password);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctors</title>
</head>

<body class="mx-5 my-5">

  <div class="row">
    <div class="col-10">
      <h2>Doctors</h2>
    </div>
    <div class="col-2">
      <button type="submit" class="btn btn-primary"><a href="insertDoctor.php" class="text-light"
          style="text-decoration: none;">Add Doctor</a></button>
    </div>
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
        <th>Operations</th>
      </tr>
    </thead>
    <?php
    $data = "SELECT * FROM doctors";
    $result = $database->query($data);
    if ($result->rowCount() > 0) {
      foreach ($result as $doctor) {
        echo "<tbody>";
        echo "<tr id='newTr'>";
        echo "<td>" . $doctor['Doctor_id'] . "</td>";
        echo "<td>" . $doctor['FName'] . "</td>";
        echo "<td>" . $doctor['LName'] . "</td>";
        echo "<td>" . $doctor['License_number'] . "</td>";
        echo "<td>" . $doctor['Phone_number'] . "</td>";
        echo "<td>" . $doctor['Speciality'] . "</td>";
        echo "<td><button class='btn update-btn btn-warning btn-sm' name='update'><a href='updateDoctor.php?updateid=" . $doctor['Doctor_id'] . "'' class='text-dark' style='text-decoration: none;'>Update</a></button> ";
        echo " <button class='btn delete-btn btn-danger btn-sm' name='delete'><a href='deleteDoctor.php?deleteid=" . $doctor['Doctor_id'] . "' class='text-dark' style='text-decoration: none;'>Delete</a></button></form></td>";
        echo "</tr>";
        echo "</tbody>";
      }
    } else {
      echo "<tr><td colspan='7'>No doctors found</td></tr>";
    }
    ?>
  </table>
</body>

</html>