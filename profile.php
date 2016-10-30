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
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
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
                                <h1><a href="home.php"><span>P</span>REFACE</a></h1>
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
                                                <a href="profile-update.html">Edit Profile</a>
                                                <a href="">Change Password</a>
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
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }else if(isset($_SESSION["profile_id"])){
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


                    <div class="banner-info">
                        <div class="col-md-7 header-right">
                            <h1>Hi !</</h1>
                            <h6>
                            <?php 
                                if (empty($row->job)) 
                                    echo "FREE";
                                else 
                                    echo $row->job;
                                if($id != $_SESSION["profile_id"])
                                    echo "<a class=\"a-btn-a scroll\">Following</a>";        
                            ?></h6>
                            <ul class="address">

                                <li>
                                    <ul class="address-text">
                                        <li><b>NAME</b></li>
                                        <li><?php echo $row->fullname ?></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="address-text">
                                        <li><b>D.O.B</b></li>
                                        <li><?php echo $row->dateofbirth ?></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="address-text">
                                        <li><b>PHONE </b></li>
                                        <li><?php echo $row->phone ?></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="address-text">
                                        <li><b>E-MAIL </b></li>
                                        <li><a href="mailto:example@mail.com"><?php echo $row->email ?></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="address-text">
                                        <li><b>WEBSITE </b></li>
                                        <li><a href="http://w3layouts.com"><?php echo $row->website ?></a></li>
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
            <div id="about" class="about">
                <div class="col-md-6 about-left">
                    <div id="owl-demo1" class="owl-carousel owl-carousel2">
                        <div class="item">
                            <div class="about-left-grid">
                                <h2>Hi! I'm <span><?php echo $row->fullname ?></span></h2>
                                <p><?php echo $row->description ?></p>
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
                    <?php 
                        // $query = $conn->prepare("select * , count(post_like.post_id)from post LEFT JOIN post_like ON post_like.post_id = post.id LEFT JOIN post_comment ON post_comment.post_id = post.id where profile_id = ?");
                        $query = $conn->prepare("select * from post where profile_id = ?");
                        $query->bind_param("i", $id);
                        $result = $query->execute();

                        if (!$result)
                            die("Gagal Query");

                        //tarik data ke result set
                        $rows = $query->get_result();
                        while ($row = $rows->fetch_array()) { 

                    ?>
                    <div class="photo">
                        <a href="">
                        <?php 
                            $source = "Post/" . $row['image'];
                            echo "<img src=\"$source\" >" ;
                            echo "<span>10 <i class=\"fa fa-heart\"></i> 20 <i class=\"fa fa-comments\"></i></span>";
                         ?> 
                        </a>
                    </div>                     
                    <?php } ?>

                </div>
            </div>



<!-- /header -->


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
<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
</script>
<!--end-smooth-scrolling-->
<!-- //for bootstrap working -->
<script src="js/bootstrap.js"></script>


</body>
</html>

