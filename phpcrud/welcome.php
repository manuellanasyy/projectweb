<?php

session_start();

include_once("config.php");

error_reporting(0);

$result = mysqli_query($conn, "SELECT * FROM kontak ORDER BY id DESC");

?>

<link rel="stylesheet" href="style.css">
<html>

<head>
    <title>Data Peserta</title>
</head>

<body>
    <div class="d-flex">
        <a href="add.php"><button class="button-add" role="button">Add </button></a><br /><br />
        <a href="logout.php">
            <button class="button-logout-pushable" role="button">
                <span class="button-logout-shadow"></span>
                <span class="button-logout-edge"></span>
                <span class="button-logout-front">
                    Logout
                </span>
            </button>
        </a>
    </div>
    <div class="container">
        <span class="borderLine"></span>

        <table class="table-cantik" width="75%">

            <tr>
                <th class="padding">Name</th>
                <th class="padding">Email</th>
                <th class="padding">Mobile</th>
                <th class="padding">Photo</th>
                <th class="padding">Action</th>
            </tr>

            <?php
            while ($user_data = mysqli_fetch_array($result)) : ?>
                <tr style="text-align: center;">
                    <td class="padding"><?= $user_data['name'] ?></td>
                    <td class="padding"><?= $user_data['email'] ?></td>
                    <td class="padding"><?= $user_data['mobile'] ?></td>
                    <td class="padding">
                        <img src="<?= $user_data['photo'] ?>" alt="">
                        
                    </td>
                    <td>
                        <div class="action" style="display: flex; justify-content:center; gap: 10px;">
                            <a href="detail.php?id=<?= $user_data['id']; ?>" style="text-decoration: none;">
                                <button class="button-detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <circle cx="12" cy="12" r="6"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                    </svg>
                                </button>
                            </a>
                            <a href="edit.php?id=<?= $user_data['id']; ?>" style="text-decoration: none;">
                                <button class="button-edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                    </svg>
                                </button>
                            </a>
                            <a href="delete.php?id=<?= $user_data['id']; ?>">
                                <button class="button-delete" style="text-decoration: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>