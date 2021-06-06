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
    <link rel="icon" href="favicon.png" type="image/png" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>Update Data</title>
</head>

<body>
    <?php
    if (isset($_GET["updateID"])) {
        $data_to_be_updated = $_GET["updateID"];
        $data = getArtikelWithID($data_to_be_updated);
    ?>

        <br>
        <h1>UPDATE ARTICLE WITH ID <?= $data_to_be_updated ?></h1>

        <form action="update.php?updateID=<?php echo $_GET["updateID"] ?>" method="POST" enctype="multipart/form-data">
            <p class="update.p">ID: <input type="text" name="update_id" value="<?= $data['id'] ?>" readonly /></p>
            <p class="update.p">Gambar Cover: <input type="file" name="update_gambar_cover" /></p>
            <p class="update.p">Judul: <input type="text" name="update_judul" value="<?= $data['judul'] ?>" /></p>
            <p class="update.p">Isi: <textarea name="update_isi" rows="15" cols="90" required><?= $data['isi'] ?></textarea></p>
            <p class="update.p"><input type="submit" name="update_admin_submit" required /></p>
        </form>

        <?php
    }
    else
    {
        echo '<span style="margin-top: 50%;">Anda harus memilih artikel yang ingin diupdate terlebih dahulu, <a href="index.php" style="color: #000; font-weight: bold; text-decoration: underline;">klik disini</a> untuk kembali ke halaman list artikel</span>';
    }

    if (isset($_POST["update_admin_submit"])) {
        $id = $_POST["update_id"];
        $judul = $_POST["update_judul"];
        $isi = $_POST["update_isi"];

        $img1 = $_FILES['update_gambar_cover']['name'];
        $loc1 = $_FILES['update_gambar_cover']['tmp_name'];

        // mengambil informasi file yang diupload
        $pathInfo = pathinfo($_FILES["update_gambar_cover"]["name"]);
        
        // modifikasi nama file supaya bersifat unique
        $image_name = $pathInfo['filename'].'_'.time().'.'.$pathInfo['extension'];

        // modifikasi path file
        $image_path = 'gambar/'.$image_name;

        // cek apakah data file lama masih ada
        if (file_exists('gambar/'.$data['img1'])) {
            // jika ada maka hapus file yang lama
            unlink('gambar/'.$data['img1']);
        }

        // upload file ke server
        move_uploaded_file($loc1, $image_path);

        // memasukkan data ke database
        $result = updateArtikel($id, $image_name, $judul, $isi);

        if ($result == 1) {
        ?>
            <h1>UPDATE ARTIKEL DATA with ID <?= $id ?> SUCCESS</h1>
            <p>Gambar Cover : <img src="<?= $image_path ?>" alt=""></p>
            <p>Judul : <?= $judul ?></p>
            <p>Isi : <?= $isi ?></p>
    <?php
        }
    ?>

</body>

</html>
