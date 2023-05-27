<?php

include_once("config.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM kontak WHERE id=$id");
$data = mysqli_fetch_assoc($result);
unlink($data['photo']);

// delete record
mysqli_query($conn, "DELETE FROM kontak WHERE id=$id");

header("Location:welcome.php");
