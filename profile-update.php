<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <script src="js/jquery.min.js"></script>
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Preface Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
        <link href='//fonts.googleapis.com/css?family=Asap:400,700,400italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>

</head>
<body>
	<div id="home" class="header">
        <div class="container">
            <div class="top-header">
                <div class="top-nav">
                    <div class="navigation">
                        <div class="logo">
                            <h1><a href="index.html"><span>P</span>REFACE</a></h1>
                        </div>
                        <div class="float_center">
                            <form action="">
                                <input type="text" id="search" style="width: 300px">
                            </form>
                        </div>

                        <div class="navigation-right">

                            <nav class="link-effect-3" id="link-effect-3">

                                <ul class="nav1 nav nav-wil">
                                    <li><button onclick="myFunction()" class="dropbtn"><img src="images/user.png" style="width: 32px; height: 32px"></a></button>
                                          <div id="myDropdown" class="dropdown-content">
                                            <a href="profile.php">My Profile</a>
                                            <a href="profile.php">Change Password</a>
                                            <a href="delete-acc.php">Delete Account</a>
                                            <a href="logout.php">Log Out</a>
                                          </div>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <div class="space"></div>
    <?php
        require_once "db.php";
        if(isset($_SESSION["profile_id"])){
            $id = $_SESSION["profile_id"];
        }else{
            header("Location:login.php");
        }    
        $conn = konek_db();
        $query = $conn->prepare("select * from profile where id = ?");
        $query->bind_param("i", $id);
        $result = $query->execute();
        if (!$result) {
            die("die");
        }
        $rows = $query->get_result();
        $row = $rows->fetch_object();
    ?>
	<div class="main">
		<div class="container">
			<table>
				<form action="update-profile.php" method="POST" enctype="multipart/form-data">
					<tr>
						<td>Full Name</td>
						<td><input type="text" name="fullname" value="<?php echo $row->fullname; ?>"></td>
					</tr>
					<tr>
						<td>Date OF Birth</td>
						<td><input type="text" name="date" placeholder="YYYY-MM-DD" value="<?php echo $row->dateofbirth; ?>"> </td>
					</tr>
					<tr>
						<td>Phone</td>
						<td><input type="text" name="phone" value="<?php echo $row->phone; ?>"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" value="<?php echo $row->email; ?>"></td>
					</tr>
					<tr>
						<td>Website</td>
						<td><input type="text" name="website" value="<?php echo $row->website; ?>"></td>
					</tr>
					<tr>
						<td>Job</td>
						<td><input type="text" name="job" value="<?php echo $row->job; ?>"></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><textarea name="desc"><?php echo $row->fullname; ?></textarea></td>
					</tr>
					<tr>
						<td>Profile Picture</td>
						<td><input type="file" name="profile-img"></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: center;"><input type="submit" name="" value="UPDATE PROFILE"></td>
					</tr>
				</form>
			</table>
		</div>
	</div>
	<div class="space"></div>
	<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
</script>
</body>
</html>