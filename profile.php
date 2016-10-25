<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Preface</title>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <script src="js/jquery.min.js"></script>
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Preface Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
        <link href='//fonts.googleapis.com/css?family=Asap:400,700,400italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!---- start-smoth-scrolling---->
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

                                        <li><a class="scroll" href="#about"><img src="images/notification.png" style="width: 32px; height: 32px"></a></li>
                                        <li><a class="scroll" href="#services" ><img src="images/user.png" style="width: 32px; height: 32px"></a></li>
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
        if(!isset($_SESSION["user_id"]))
            if (isset($_POST["nama"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
                $nama = $_POST["nama"];
                $email = $_POST["email"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $conn = konek_db();
                $query = $conn->prepare("insert into profile(fullname, email) values(?, ?)");
                $query->bind_param("ss", $nama, $email);
                $result = $query->execute();
                $id =  mysqli_insert_id($conn);
                if (!$result)
                    die("<p>Proses query gagal.</p>");
                else {
                    $query = $conn->prepare("insert into login(username, password, profile_id) values(?, ?, ?)");
                    $query->bind_param("ssi", $username, $password, $id);
                    $result = $query->execute();
                    if ($result) {
                        $_SESSION['user_id'] = $id;
                        

                    ?>


                    <div class="banner-info">
                        <div class="col-md-7 header-right">
                            <h1>Hi !</</h1>
                            <h6>UX & UI DESIGNER<a class="a-btn-a scroll" href="#port">Following</a></h6>
                            <ul class="address">

                                <li>
                                    <ul class="address-text">
                                        <li><b>NAME</b></li>
                                        <li>I'M ROB LEE</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="address-text">
                                        <li><b>D.O.B</b></li>
                                        <li>23-06-1980</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="address-text">
                                        <li><b>PHONE </b></li>
                                        <li>+00 111 222 3333</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="address-text">
                                        <li><b>ADDRESS </b></li>
                                        <li>756 Global Place,New York.</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="address-text">
                                        <li><b>E-MAIL </b></li>
                                        <li><a href="mailto:example@mail.com"> mail@example.com</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="address-text">
                                        <li><b>WEBSITE </b></li>
                                        <li><a href="http://w3layouts.com">www.myresume.com</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-5 header-left">
                            <img src="images/img1.jpg" alt="">
                        </div>
                        <div class="clearfix"> </div>

                    </div>
                </div>
            </div>
            </div>
            <!-- about -->
            <div id="about" class="about">
                <div class="col-md-6 about-left">
                    <div id="owl-demo1" class="owl-carousel owl-carousel2">
                        <div class="item">
                            <div class="about-left-grid">
                                <h2>Hi! I'm <span>Rob Lee</span></h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis.</p>
                                <!-- <ul>
                                        <li><a class="a-btn-a scroll" href="#port">Follow +</a></li>
                                        <li><a class="a-btn-h scroll" href="#contact">Hire Me</a></li>
                                </ul> -->
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 about-right">

                </div>
                <div class="clearfix"> </div>
                <link href="css/owl.carousel.css" rel="stylesheet">
                <script src="js/owl.carousel.js"></script>
                <script>
                        $(document).ready(function () {
                            $("#owl-demo1").owlCarousel({
                                items: 1,
                                lazyLoad: false,
                                autoPlay: true,
                                navigation: false,
                                navigationText: false,
                                pagination: true,
                            });
                        });
                </script>
                <!-- Feedback -->
                <script>
                    $(document).ready(function () {
                        $("#owl-demo3").owlCarousel({
                            items: 1,
                            lazyLoad: false,
                            autoPlay: true,
                            navigation: false,
                            navigationText: true,
                            pagination: true,
                        });
                    });
                </script>
            </div>
            <!-- /about -->
            <div id="photos" class="photos">
                <div class="container">
                    <div class="photo">
                        <a href=""><img src="images/b1.jpg" >   
                            <span>test</span></a>
                    </div>
                    <div class="photo">
                        <img src="images/b2.jpg" >  
                        <span>test</span></a>
                    </div>
                    <div class="photo">
                        <img src="images/b3.jpg" >  
                        <span>test</span></a>
                    </div>
                    <div class="photo">
                        <img src="images/img1.jpg" >    
                    </div>
                    <div class="photo">
                        <img src="images/pic1.jpg" >    
                    </div>
                    <div class="photo">
                        <img src="images/pic2.jpg" >    
                    </div>
                    <div class="photo">
                        <img src="images/pic3.jpg" >    
                    </div>
                    <div class="photo">
                        <img src="images/pic4.jpg" >    
                    </div>
                    <div class="photo">
                        <img src="images/pic5.jpg" >    
                    </div>
                    <div class="photo">
                        <img src="images/pic6.jpg" >    
                    </div>

                </div>
            </div>
            <?php
                        }
                        else {
                            //tidak terinsert
                        }     
                    }
                } else {
                    echo "<p>Data produk belum diisi!</p>";
                }
            } else {}
            ?>



<!-- /header -->
<div class="footer" id="contact">
    <div class="container">

        <div class="copy_right text-center">
            <p>&copy; 2016 Preface . All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts.</a></p>
        </div>
    </div>
</div>
<!-- //footer -->

<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!--start-smooth-scrolling-->
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!--end-smooth-scrolling-->
<!-- //for bootstrap working -->
<script src="js/bootstrap.js"></script>


</body>
</html>
