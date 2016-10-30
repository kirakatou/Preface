<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Innovative Login Form Flat Responsive Widget Template :: w3layouts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Innovative Login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Custom Theme files -->
        <link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
        <!-- //Custom Theme files -->
        <!-- web font -->
        <link href='//fonts.googleapis.com/css?family=Text+Me+One' rel='stylesheet' type='text/css'>
        <!-- //web font -->
        <!-- js -->
        <script src="js/jquery.min.js"></script>
        <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });
        </script>
        <!-- //js -->
    </head>
    <body>
        <?php
        require_once "db.php";
        if (isset($_SESSION["profile_id"]))
            header("Location: home.php");
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = $_POST["username"];
            $password = sha1($_POST["password"]);
            $conn = konek_db();
			$query = $conn->prepare("select password, login.profile_id, count(post.profile_id) from login left join post on post.profile_id = login.profile_id where username = ?");
			
			$query->bind_param("s", $username);
			$query->execute();
			$query->bind_result($pass, $id, $post_count);
			$query->fetch();
			if ($password != null || $password == '') {
				if ($password == $pass) {
	                $_SESSION["profile_id"] = $id;
                    $_SESSION["post_count"] = $post_count;
	                header("Location: home.php");
	            } else {
	                echo "<p>Username/Password salah</p>";
	            }
			}else {
				echo "<p>Username/Password salah part 1</p>";
			}
        }
        ?>
        <div class="main">
            <div class="main-info">
                <div class="sap_tabs">
                    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                        <div class="logo">
                            <h1><span>P</span>REFACE</h1>
                        </div>
                        <ul class="resp-tabs-list">
                            <li class="resp-tab-item" aria-controls="tab_item-0" aria-selected="false"><h2><span>Login</span></h2></li>
                            <li class="resp-tab-item" aria-controls="tab_item-1" aria-selected="true"><span>Register</span></li> 
                        </ul>	
                        <div class="clear"> </div>	
                        <div class="resp-tabs-container">
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                <div class="agileits-login">
                                    <form action="#" method="post">
                                        <input type="text" class="email" name="username" placeholder="Username" required=""/>
                                        <input type="password" class="password" name="password" placeholder="Password" required=""/>
                                        <div class="wthree-text"> 
                                            <ul> 
                                                <li>
                                                    <label class="anim">
                                                        <input type="checkbox" class="checkbox">
                                                        <span> Remember me ?</span> 
                                                    </label> 
                                                </li>
                                                <li> <a href="#">Forgot password?</a> </li>
                                            </ul>
                                            <div class="clear"> </div>
                                        </div>  
                                        <div class="w3ls-submit">
                                            <div class="submit-text">
                                                <input type="submit" value="LOGIN"> 
                                            </div>	
                                        </div>	
                                    </form>
                                </div> 
                            </div>
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                <div class="login-top sign-top">
                                    <div class="agileits-login">
                                        <form action="profile.php" method="post">
                                            <input type="text" name="nama" placeholder="Full Name" required="">
                                            <input type="text" name="username" placeholder="Username" required="">
                                            <input type="text" class="email" name="email" placeholder="Email" required=""/>
                                            <input type="password" class="password" name="password" placeholder="Password" required=""/>	
                                            <label class="anim">
                                                <input type="checkbox" class="checkbox">
                                                <span> I accept the terms of use</span> 
                                            </label> 
                                            <div class="w3ls-submit">
                                                <div class="submit-text">
                                                    <input class="register" type="submit" value="REGISTER">  
                                                </div>	
                                            </div>
                                        </form> 
                                    </div>  
                                </div>
                            </div>
                        </div>	
                    </div>
                    <div class="clear"> </div>
                </div>  
            </div>
            <!-- copyright -->
            <div class="copyright">
                <p> © 2016 Innovative Login Form . All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
            </div>
            <!-- //copyright -->
        </div>	
        <!-- //main --> 
    </body>
</html>