<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Preface</title>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Preface Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
        <!-- webfonts -->
        <link href='//fonts.googleapis.com/css?family=Asap:400,700,400italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>

        <!-- webfonts -->
        <!---- start-smoth-scrolling---->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript" src="js/timelapsed.js"></script>
        <script type="text/javascript">
            // jQuery(document).ready(function ($) {
            // $(".scroll").click(function (event) {
            // event.preventDefault();
            // $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            // });
            // });

        </script>
        <!---- start-smoth-scrolling---->
    </head>
    <body>
        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <form action="insertPost.php" method="POST" enctype="multipart/form-data" >
                    <input id="f02" type="file" name="image" placeholder="Add profile picture" onclick="readURL(this);" accept="image/*"/>
                    <label for="f02"><img src="images/no_image.png" id="blah" alt="Your image"></label>
                    <!-- <label class="cabinet">
                        <img src="images/no_image.png" id="blah" alt="Your image">
                        <input type="file" name="imagess"  accept="image/*"> 
                         onclick="readURL(this);" 
                     </label> --> 

                    <textarea id="description" name="desc"></textarea>
                    <input type="submit" name="post-btn" value="POST">  
                </form>
            </div>
        </div>
        <div id="home" class="header">
            <div class="container">
                <!-- top-hedader -->
                <div class="top-header">
                    <!-- /logo -->
                    <!--top-nav---->
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
            </div></div>
        <div class="space"></div>

        <?php
        require_once "db.php";

        $conn = konek_db();
        //eksekusi query untuk tarik data dari database
        $query = $conn->prepare("select * from post");
        $result = $query->execute();

        if (!$result)
            die("Gagal Query");

        //tarik data ke result set
        $rows = $query->get_result();
        while ($row = $rows->fetch_array()) {
            $url_image = 'post/' . $row['image'];
            $desc = $row["description"];
            $postdate = $row["datetime"];
            $id = $row["id"];
            echo "<div class=\"post\">\n";
            echo "\t<div class=\"post-head\">\n";
            echo "\t\t<img src=\"images/img1.jpg\" class=\"profile-pic\">\n";
            
            // echo "\t\t<p class=\"time-post\">" . time_elapsed_string($postdate, false) . "</p>\n";
            echo "\t</div>\n";
            echo "\t<div class=\"post-img\">\n";
            echo "<input type=\"hidden\" name=\"p-id\" value=\"$id\" />";
            echo "\t\t<i class=\"fa fa-heart\"></i>\n";
            echo "\t\t<img src=\"$url_image\">\n";
            echo "\t</div>\n";
            echo "\t<div class=\"post-description\">\n";
            echo "\t\t<p>$desc</p>\n";
            echo "\t</div>\n";
            echo "</div>\n";
        }
        ?>

        <div class="space"></div>
        <div class="footer">
            <div class="post-button">
                <button onclick="openNav();">POST</button>
            </div>

        </div>
        <script>
            function openNav() {
                document.getElementById("myNav").style.height = "80%";
                document.getElementById("blah").src = "images/no_image.png";
                document.getElementById("description").value = '';
            }

            function closeNav() {
                document.getElementById("myNav").style.height = "0%";
            }
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById("blah").src = e.target.result;
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            

            $(document).ready(function() {

                $(".post").dblclick(function() {
                    var javascriptVariable = $(this).find("input[type=hidden]");
                    var heart = $(this).find("i");
                    $.ajax({
                       type: "GET",
                       url: "post.php",
                       data: "id="+javascriptVariable.val(),
                       success: function(){
                           heart.fadeIn("slow");

                        setTimeout(function() {
                            heart.fadeOut("slow");
                        }, 2000);                     
                        }
                    })
                        
                        


                });

            });
        </script>

    </body>
</html>