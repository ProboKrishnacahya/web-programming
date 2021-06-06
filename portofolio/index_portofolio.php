<?php include_once("portofolio_controller.php"); ?>
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

    <?php
    if (isset($_POST["update_submit"])) {
        // penyimpanan data yang dikirim melalui form
        $id = $_POST["update_id"];
        $nama_proyek = $_POST["update_nama_proyek"];
        $tanggal_proyek = $_POST["update_tanggal_proyek"];
        $deskripsi_proyek = $_POST["update_deskripsi_proyek"];
        $keahlian_khusus = $_POST["update_keahlian_khusus"];
        $pencapaian = $_POST["update_pencapaian"];
        $riwayat_pendidikan = $_POST["update_riwayat_pendidikan"];

        $result = updatePortofolio($id, $nama_proyek, $tanggal_proyek, $deskripsi_proyek, $keahlian_khusus, $pencapaian, $riwayat_pendidikan);
    }
    ?>

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

    if (isset($_POST["input_submit"])) {
        // penyimpanan data yang dikirim melalui form
        $nama_proyek = $_POST["input_nama_proyek"];
        $tanggal_proyek = $_POST["input_tanggal_proyek"];
        $deskripsi_proyek = $_POST["input_deskripsi_proyek"];
        $keahlian_khusus = $_POST["input_keahlian_khusus"];
        $pencapaian = $_POST["input_pencapaian"];
        $riwayat_pendidikan = $_POST["input_riwayat_pendidikan"];

        createPortofolio($nama_proyek, $tanggal_proyek, $deskripsi_proyek, $keahlian_khusus, $pencapaian, $riwayat_pendidikan);
    }
    ?>

    <table border="1" cellspacing="0" cellpadding="10">
        <?php
        $result = readPortofolio();
        $angka = 1;
        foreach ($result as $barisdata) {
        ?>
            <tr>
                <td><?= $angka++ ?></td>
                <td><?= $barisdata["nama_proyek"] ?></td>
                <td><?= $barisdata["tanggal_proyek"] ?></td>
                <td><?= $barisdata["deskripsi_proyek"] ?></td>
                <td><?= $barisdata["keahlian_khusus"] ?></td>
                <td><?= $barisdata["pencapaian"] ?></td>
                <td><?= $barisdata["riwayat_pendidikan"] ?></td>
                <?php
                if (isset($_SESSION['email'])) { ?>
                    <td><a href="delete_portofolio.php?deleteID=<?= $barisdata['id_portofolio'] ?>">Hapus Portofolio</a></td>
                    <td><a href="update_portofolio.php?updateID=<?= $barisdata['id_portofolio'] ?>">Update Portofolio</a></td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>