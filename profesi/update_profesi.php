<?php include_once("profesi_controller.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PartnerSeeker</title>
    <link rel="stylesheet" href="index_website.css" />
    <script src="index_website.js"></script>
</head>

<body>

    <nav class="menu">
        <ul>
            <div class="header">
                <a href="index_home.html"><img class="logo" src="logo.png" /></a>
            </div>
            <li><a href="index_profesi.php">Profesi</a></li>
            <li><a href="index_artikel.html">Tips Karier</a></li>
            <li><a href="index_sk.html">&nbspS & K</a></li>
            <li><a href="index_login_freelancer.php">Login</a></li>
        </ul>
    </nav>

    <?php
    if (isset($_GET["updateID"])) {
        $data_to_be_updated = $_GET["updateID"];
        $data = getIdProfesi($data_to_be_updated);
    }
    ?>

    <h1>Update Data Profesi dengan ID <?= $data_to_be_updated ?></h1>

    <form action="index_profesi.php" method="POST">
        <p>ID: <input type="text" name="update_id" value="<?= $data['id_profesi'] ?>" readonly /></p>
        <p>Bidang Profesi: <input type="text" name="update_bidang_profesi" value="<?= $data['bidang_profesi'] ?>" /></p>
        <p>Nama Lengkap: <input type="text" name="update_nama_lengkap" value="<?= $data['nama_lengkap'] ?>" /></p>
        <p>Tempat Tgl Lahir: <input type="text" name="update_tempat_tgllahir" value="<?= $data['tempat_tgl_lahir'] ?>" /></p>
        <p>Domisili: <input type="text" name="update_domisili" value="<?= $data['domisili'] ?>" /></p>
        <p>Email: <input type="text" name="update_email" value="<?= $data['email'] ?>" /></p>
        <p>Perbarui Profil<input type="submit" name="update_submit" value="UPDATE" /></p>
    </form>

</body>

</html>