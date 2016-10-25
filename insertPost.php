<?php 
session_start();
require_once "db.php";
	if (isset($_FILES["image"])) {
        $description = isset($_POST['desc']) ? $_POST['desc'] : '';
        $file_gambar = "";
        if ($_FILES["image"]["error"] == 0){
            $image = $_FILES["image"];
            $extension = new SplFileInfo($image['name']);
            $extension = $extension -> getExtension();
            $count = $_SESSION["post_count"] + 1;
            $file_gambar = $_SESSION["profile_id"] . '-' . $count . '.' . $extension;

            copy ($image['tmp_name'], 'post/' . $file_gambar);        
        }
        $conn = konek_db();
        $query = $conn->prepare("insert into post(profile_id, image, description, datetime) values(?, ?, ?, now())");
    	$query->bind_param("iss", $_SESSION["profile_id"], $file_gambar, $description);
   		$result = $query->execute();
   		if (! $result)
        	die("<p>Proses query gagal.</p>");
        $_SESSION["post_count"] = $count;
		echo "<p>Data produk berhasil ditambahkan.</p>";
		header("Location: home.php");

	} else {
		echo "<p>Data produk belum diisi!</p>";
	}

 ?>