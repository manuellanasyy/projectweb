<?php

include 'config.php';

// error_reporting(0);

// session_start();

// if(!isset($_SESSION["index"])) {
//     header ("Location: index.php");
//     exit;
// }
// 
?>
<?php

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM kontak WHERE id=$id");
$data = mysqli_fetch_assoc($result);
// var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETAIL</title>
</head>

<body>

    <center>
        <h2>Detail Data</h2>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td rowspan="4">
                    <img src="<?= $data["photo"] ?>" width="200">
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?= $data["name"] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $data["email"] ?></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><?= $data["mobile"] ?></td>
            </tr>
        </table>
        <a href="welcome.php">Back</a>.</p>
    </center>

</body>

</html>