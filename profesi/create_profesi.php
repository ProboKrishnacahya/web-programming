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

    <form action="create_portofolio.php" method="POST">
        <p>Bidang Profesi: <input type="text" name="input_bidang_profesi" /></p>
        <p>Nama Lengkap: <input type="text" name="input_nama_lengkap" /></p>
        <p>Tempat Tgl Lahir: <input type="text" name="input_tempat_tgllahir" /></p>
        <p>Domisili: <input type="text" name="input_domisili" /></p>
        <p>Email: <input type="text" name="input_email" /></p>
        <input type="submit" name="input_submit" value="Lanjut Ke Portofolio" />
    </form>

</body>

</html>