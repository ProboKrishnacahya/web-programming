<?php include_once("controller.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="table_article.css" />
    <link rel="stylesheet" href="admin_article.css" />
    <link rel="stylesheet" href="index_login_admin.css" />
    <title>Update Data</title>
</head>

<body>
    <?php
    if (isset($_GET["updateID"])) {
        $data_to_be_updated = $_GET["updateID"];
        $data = getArtikelWithID($data_to_be_updated);
    ?>

        <br><h1>UPDATE ARTIKEL DATA with ID <?= $data_to_be_updated ?></h1>

        <form action="update.php" method="POST">
            <p class="update.p">ID: <input type="text" name="update_id" value="<?= $data['id'] ?>" readonly /></p>
            <p class="update.p">Gambar Cover: <input type="file" name="update_gambar_cover" value="<?= $data['gambar_cover'] ?>" /></p>
            <p class="update.p">Judul: <input type="text" name="update_judul" value="<?= $data['judul'] ?>" /></p>
            <p class="update.p">Isi: <textarea name="input_isi" rows="15" cols="90" required></textarea></p>
            <p class="update.p"><input type="submit" name="update_admin_submit" required /></p>
            </form>

        <?php
    }

    if (isset($_POST["update_admin_submit"])) {
        $id = $_POST["update_id"];
        $gambar_cover = $_POST["update_gambar_cover"];
        $judul = $_POST["update_judul"];
        $isi = $_POST["update_isi"];

        $result = updateArtikel($id, $gambar_cover, $judul, $isi);

        if ($result == 1) {
        ?>
            <h1>UPDATE ARTIKEL DATA with ID <?= $id ?> SUCCESS</h1>
            <p>Gambar Cover : <?= $gambar_cover ?></p>
            <p>Judul : <?= $judul ?></p>
            <p>Isi : <?= $isi ?></p>
    <?php
        }
    }
    ?>

</body>

</html>