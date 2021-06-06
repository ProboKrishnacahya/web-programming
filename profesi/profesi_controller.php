<?php
require_once("db_controller.php");

include('login_check_freelancer.php');
if (!isset($_SESSION['user_id'])) {
    header('location:index_login_freelancer.php');
}

// function to read database data
function readProfesi()
{
    $allData = array();
    $conn = my_connectDB();

    if ($conn != NULL) {

        $id = $_SESSION['user_id'];

        $sql_query = "SELECT * FROM `profesi` WHERE `user_id` = $id";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // simpan data dari database ke dalam array
                $data['id_profesi'] = $row["id_profesi"];
                $data['bidang_profesi'] = $row["bidang_profesi"];
                $data['nama_lengkap'] = $row["nama_lengkap"];
                $data['tempat_tanggal_lahir'] = $row["tempat_tanggal_lahir"];
                $data['domisili'] = $row["domisili"];
                $data['email'] = $row["email"];
                array_push($allData, $data);
            }
        }
    }
    my_closeDB($conn);
    return $allData;
}

// function to save data portofolio
function createProfesi($bidang_profesi, $nama_lengkap, $tempat_tanggal_lahir, $domisili, $email)
{
    if ($bidang_profesi != "" && $nama_lengkap != "" && $tempat_tanggal_lahir != "" && $domisili != "" && $email != "") {
        $conn = my_connectDB();

        $id = $_SESSION['user_id'];

        $sql_query = "INSERT INTO `profesi` (`id_profesi`, `bidang_profesi`, `nama_lengkap`, `tempat_tanggal_lahir`, `domisili`, `email`, `user_id`) 
                                       VALUES (NULL, '$bidang_profesi', '$nama_lengkap', '$tempat_tanggal_lahir', '$domisili', '$email', '$id');";

        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    } else {
        return "Data tidak lengkap";
    }
}

// function to detele data from portofolio
function deleteProfesi($id_profesi)
{
    if ($id_profesi > 0) {
        $conn = my_connectDB();
        $sql_query = "DELETE FROM `profesi` WHERE `id_profesi` = " . $id_profesi;
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
        return $result;
    }
}

function getIdProfesi($id_profesi)
{
    $data = array();
    if ($id_profesi > 0) {
        $conn = my_connectDB();
        $sql_query = "SELECT * FROM `profesi` WHERE id_profesi = " . $id_profesi;
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // simpan data dari database ke dalam array
                $data['id_profesi'] = $row["id_profesi"];
                $data['bidang_profesi'] = $row["bidang_profesi"];
                $data['nama_lengkap'] = $row["nama_lengkap"];
                $data['tempat_tanggal_lahir'] = $row["tempat_tanggal_lahir"];
                $data['domisili'] = $row["domisili"];
                $data['email'] = $row["email"];
            }
        }
        my_closeDB($conn);
        return $data;
    }
}

function updateProfesi($id_profesi, $bidang_profesi, $nama_lengkap, $tempat_tanggal_lahir, $domisili, $email)
{
    if ($id_profesi != "" && $bidang_profesi != "" && $nama_lengkap != "" && $tempat_tanggal_lahir != "" && $domisili != "" && $email != "") {
        $conn = my_connectDB();
        $sql_query = "UPDATE `profesi` 
                        SET `bidang_profesi` = '$bidang_profesi',
                            `nama_lengkap` = '$nama_lengkap',
                            `tempat_tanggal_lahir` = '$tempat_tanggal_lahir',
                            `domisili` = '$domisili',
                            `email` = '$email' 
                      WHERE `id_profesi` = $id_profesi;";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
        return $result;
    }
}
