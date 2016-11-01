<?php
session_start();
require_once "db.php";
if(!isset($_SESSION["user_id"])){
    if (isset($_POST["nama"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = sha1($_POST["password"]);
        $conn = konek_db();
        $query = $conn->prepare("insert into profile(fullname, email) values(?, ?)");
        $query->bind_param("ss", $nama, $email);
        $result = $query->execute();
        $id = mysqli_insert_id($conn);
        if (!$result)
            die("<p>Proses query gagal.</p>");
        else {
            $query = $conn->prepare("insert into login(username, password, profile_id) values(?, ?, ?)");
            $query->bind_param("ssi", $username, $password, $id);
            $result = $query->execute();
            if ($result) {
                $_SESSION['profile_id'] = $id;
                $_SESSION['post_count'] = 0;
                header("Location:home.php");
            }
            else {
                $query = $conn->prepare("delete from profile where id=?");
                $query->bind_param("i",$id);
                $result = $query->execute();
                echo "<script type='text/javascript'>alert('Failed to Register.');</script>";
            }
        }
    } else {
        echo "<script type='text/javascript'>alert('Data pribadi belum diisi.');</script>";
    }
} else {

}
?>