<?php
    $username = 'root';
    $password = '';
    $database = new PDO('mysql:host=localhost;dbname=clinicdb;', $username, $password);
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $delete = $database->prepare("DELETE FROM doctors WHERE Doctor_id=$id");
        $delete->execute();
        header('location:doctors.php');
    }
?>