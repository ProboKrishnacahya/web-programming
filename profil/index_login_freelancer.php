<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Freelancer</title>
    <link rel="stylesheet" href="index_login_freelancer.css" />
    <link rel="icon" href="favicon.png" type="image/png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
</head>

<body>

    <div class="container">

        <nav class="menu">
            <ul>
                <div class="header">
                    <a href="index_home.html"><img class="logo" src="logo.png" /></a>
                </div>
                <li><a href="index_profesi.php">Profesi</a></li>
                <li><a href="index_artikel.html">Tips Karier</a></li>
                <li><a href="index_sk.html">&nbspS & K</a></li>
                <li><a class="active" href="index_login_freelancer.html">Login</a></li>
            </ul>
        </nav>

        <?php
        include_once("freelancer_controller.php");

        if (isset($_POST["answerRegister"])) {

            $email = $_POST["email_register"];
            $password = $_POST["password_register"];

            createFreelancer($email, $password);
        }
        ?>

        <div class="profile">
            <form action="login_check_freelancer.php" method="POST">
                <h1>Welcome Back!</h1><br>

                <i class="fa fa-envelope"><label>Email</label></i><br>
                <input type="email" placeholder="Type here" name="email" required /><br>

                <i class="fa fa-lock"><label>Password</label></i><br>
                <input type="password" placeholder="Type here" name="password" id="password" required /><br>

                <button type="submit" name="submitProfesi"><a class="buttonText">LOGIN</a></button>
        </div>

    </div>

    <p class="registerHere">Belum membuat akun? <a href="index_register_freelancer.php"><b>Register di sini.</b></a></p>

    <nav class="menu">
        <div class="footer">
            © Copyright 2021, <a href="index_home.html">PartnerSeeker</a>
        </div>
    </nav>
    

</body>

</html>
