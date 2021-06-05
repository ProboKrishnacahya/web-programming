<?php
session_start();

if (!isset($_SESSION['username'])) {
	header("location: index_akun_admin.php");
}
?>

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
    <title>Read Data</title>
</head>

<body>
    <br><br><h1>READ ALL ARTIKEL DATA</h1>
    <table class="readAdmin">
        <tr>
            <td class="td_readAdmin"><b>ID</b></td>
            <td class="td_readAdmin"><b>Gambar Cover</b></td>
            <td class="td_readAdmin"><b>Judul</b></td>
            <td class="td_readAdmin"><b>Isi</b></td>
            <td class="td_readAdmin"><b>Update</b></td>
            <td class="td_readAdmin"><b>Delete</b></td>
        </tr>
        <?php
        $result = readArtikel();
        foreach ($result as $barisdata) {
        ?>

            <tr>
                <td class="td_readAdmin"><b><?= $barisdata["id"] ?></b></td>
                <td class="td_readAdmin"><img class="image" src="gambar/<?= $barisdata["img1"] ?>" /></td>
                <td class="td_readAdmin"><?= $barisdata["judul"] ?></td>
                <td class="paragraf"><?= $barisdata["isi"] ?></td>
                <td class="update"><a href="update.php?updateID=<?= $barisdata['id'] ?>">Update</a></td>
                <td class="delete"><a href="delete.php?deleteID=<?= $barisdata['id'] ?>">Delete</a></td>
            </tr>
        <?php
        }
        ?>
    </table>&emsp;
    <button class="logout"><a class="logoutText" href="logout_admin.php">Logout</a></button>
</body>

</html>