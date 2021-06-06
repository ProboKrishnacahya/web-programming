<?php include_once("profesi_controller.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PartnerSeeker</title>
    <link rel="stylesheet" href="index_profesi.css"/>
    <link rel="stylesheet" href="layout.css"/>
    <link rel="icon" href="favicon.png" type="image/png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
</head>

<body>

    <?php
    if (isset($_POST["update_submit"])) {
        // penyimpanan data yang dikirim melalui form
        $id = $_POST["update_id"];
        $bidang_profesi = $_POST["update_bidang_profesi"];
        $nama_lengkap = $_POST["update_nama_lengkap"];
        $tempat_tgllahir = $_POST["update_tempat_tgllahir"];
        $domisili = $_POST["update_domisili"];
        $email = $_POST["update_email"];
        $gambar_profile = $_FILES['gambar_profile']['name'];
        $loc1 = $_FILES['gambar_profile']['tmp_name'];
        move_uploaded_file($loc1, "gambar/" . $gambar_profile);

        $result = updateProfesi($id, $bidang_profesi, $nama_lengkap, $tempat_tgllahir, $domisili, $email, $gambar_profile);
    }
    ?>

    <div class="container">
        <nav class="menu">
            <ul>
                <div class="header">
                    <a href="index_home.html"><img class="logo" src="logo.png" /></a>
                </div>
                <li><a class="active" href="index_profesi.php">Profesi</a></li>
                <li><a href="index_artikel.html">Tips Karier</a></li>
                <li><a href="index_sk.html">&nbspS & K</a></li>
                <li><a href="index_login_freelancer.php">Login</a></li>
            </ul>
        </nav>

        <?php
        $result = readProfesi();
        foreach ($result as $barisdata) {
        ?>

            <div class="profile">
                <img class="profile_picture" src="gambar/<?= $barisdata["gambar_profile"] ?>" />
                <h4 class="kategori"><?= $barisdata["bidang_profesi"] ?></h4>
                <li><i class="fa fa-user"></i><?= $barisdata["nama_lengkap"] ?></li>
                <li><i class="fa fa-calendar-alt"></i><?= $barisdata["tempat_tanggal_lahir"] ?></li>
                <li><i class="fa fa-map-marker-alt"></i><?= $barisdata["domisili"] ?></li>
                <li><i class="fa fa-envelope"></i><?= $barisdata["email"] ?></li>
                <hr>
                <a class="lihat" href="index_portofolio.php ">
                    <h3>Lihat Portofolio</h3>
                </a>
                <?php
                if (isset($_SESSION['email'])) { ?>
                    <a href="delete_profesi.php">Hapus Profesi</a>
                    <a href="update_profesi.php?updateID=<?= $barisdata['id_profesi'] ?>">Update Profesi</a>
                    <button class="logout"><a class="logoutText" href="logout_freelancer.php">Logout</a></button>
                <?php
                }
                ?>
            </div>

        <?php
        }
        ?>

        <nav class="menu">
            <div class="footer">
                © Copyright 2021, <a href="index_home.html">PartnerSeeker</a>
            </div>
        </nav>

    </div>

</body>

</html>