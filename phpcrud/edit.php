<?php

include_once("config.php");

// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM kontak WHERE id=$id");
$data = mysqli_fetch_assoc($result);
// var_dump($data);
$name = $data['name'];
$email = $data['email'];
$mobile = $data['mobile'];
$photo = $data['photo'];

if (isset($_POST['update'])) {
    var_dump('ok');
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    $result = mysqli_query($conn, "SELECT * FROM kontak WHERE id=$id");
    $data = mysqli_fetch_assoc($result);
    $filename = $data['photo'];
    if ($_FILES['photo']['size'] > 0) {
        unlink($data['photo']);
        $filename = 'img/' . $_FILES["photo"]['name'];
        move_uploaded_file($_FILES["photo"]["tmp_name"], $filename);
    }

    // update user data
    $result = mysqli_query($conn, "UPDATE kontak SET name='$name',email='$email',mobile='$mobile',photo='$filename' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: welcome.php");
}
?>
<?php
// Display selected user data based on id

?>
<html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #191825;
    }

    .box {
        position: relative;
        width: 400px;
        height: 590px;
        background: #000000;
        border-radius: 8px;
        overflow: hidden;
    }

    .box::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 380px;
        height: 420px;
        background: linear-gradient(0deg, transparent, transparent, #0F6292, #0F6292, #0F6292);
        z-index: 1;
        transform-origin: bottom right;
        animation: animate 6s linear infinite;
    }

    .box::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 380px;
        height: 420px;
        background: linear-gradient(0deg, transparent, transparent, #0F6292, #0F6292, #0F6292);
        z-index: 1;
        transform-origin: bottom right;
        animation: animate 6s linear infinite;
        animation-delay: -3s;
    }

    .borderLine {
        position: absolute;
        top: 0;
        inset: 0;
    }

    .borderLine::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 380px;
        height: 420px;
        background: linear-gradient(0deg, transparent, transparent, #E90064, #E90064, #E90064);
        z-index: 1;
        transform-origin: bottom right;
        animation: animate 6s linear infinite;
        animation-delay: -1.5s;
    }

    .borderLine::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 380px;
        height: 420px;
        background: linear-gradient(0deg, transparent, transparent, #E90064, #E90064, #E90064);
        z-index: 1;
        transform-origin: bottom right;
        animation: animate 6s linear infinite;
        animation-delay: -4.5s;
    }

    @keyframes animate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .box form {
        position: absolute;
        inset: 4px;
        background: #222;
        padding: 40px 40px;
        border-radius: 8px;
        z-index: 2;
        display: flex;
        flex-direction: column;
    }

    .box form h2 {
        color: #fff;
        font-weight: 500;
        text-align: center;
        letter-spacing: 0.1em;
    }

    .box form .inputBox {
        position: relative;
        width: 300px;
        margin-top: 35px;
        margin-bottom: 20px;
    }

    .box form .inputBox input {
        position: relative;
        width: 100%;
        padding: 10px 10px;
        background: transparent;
        outline: none;
        box-shadow: none;
        color: #23242a;
        font-size: 1em;
        letter-spacing: 0.05em;
        transition: 0.5s;
        z-index: 5;
        border: none;
    }

    .box form .inputBox span {
        position: absolute;
        left: 0;
        padding: 20px 10 px 10 px;
        pointer-events: none;
        color: #8f8f8f;
        font-size: 1em;
        letter-spacing: 0.05em;
        transition: 0.5s;
    }

    .box form .inputBox input:valid~span,
    .box form .inputBox input:focus~span {
        color: #fff;
        font-size: 0.75em;
        transform: translateY(-34px);
    }

    .box form .inputBox i {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background: #fff;
        border-radius: 4px;
        overflow: hidden;
        transition: 0.5s;
        pointer-events: none;
    }

    .box form .inputBox input:valid~i,
    .box form .inputBox input:focus~i {
        height: 44px;
    }

    .box form .links {
        display: flex;
        justify-content: flex-end;
    }

    .box form .links a {
        margin: 10px o;
        font-size: o.75em;
        color: #8f8f8f;
        text-decoration: none;
    }

    .box form .links a:hover,
    .box form .links a:nth-child(2) {
        color: #fff;
    }

    .box form input[type="submit"] {
        border: none;
        outline: none;
        padding: 9px 25px;
        background: #fff;
        cursor: pointer;
        font-size: 0.9em;
        border-radius: 4px;
        font-weight: 600;
        width: 100px;
        margin-top: 10px;
    }

    .box form input[type="submit"]:active {
        opacity: 0.8;
    }

    .btn-update {
        font-size: 20px !important;
        border: none;
        outline: none;
        padding: 5px 5px;
        background: #fff;
        cursor: pointer;
        font-size: 0.9em;
        border-radius: 4px;
        font-weight: 600;
        /* width: 100px; */
        margin-top: 10px;
        width: 100%;
    }

    .btn-update:hover {
        background-color: #d9d8d8;
    }

    .links {
        margin-bottom: 10px;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data</title>
</head>

<body>
    <div class="box">
        <span class="borderLine"></span>

        <form name="update_user" method="post" action="edit.php" enctype="multipart/form-data">
            <input type="number" value="<?= $id; ?>" name="id" hidden>
            <h2>Edit Data</h2>

            <div class="inputBox">
                <input type="text" name="name" value="<?= $data['name']; ?>">
                <span>Name</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="email" value=<?php echo $email; ?>>
                <span>Email</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="mobile" value=<?php echo $mobile; ?>>
                <span>Mobile</span>
                <i></i>
            </div>
            <div class="inputBox">
                <!-- <img src="<?= $photo; ?>" width="50"> -->
                <input type="file" name="photo">
                <span>Photo</span>
                <i></i>
            </div>
            <div class="links">
                <a href="welcome.php">Home</a>
            </div>
            <div class="update">
                <button class="btn-update" name="update" type="submit">Update</button>
            </div>
            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
        </form>
    </div>
</body>

</html>