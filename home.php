<?php 
    session_start();
    function time_passed($timestamp){
    //type cast, current time, difference in timestamps
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;
   
    //intervals in seconds
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );
   
    //now we just find the difference
    if ($diff == 0)
    {
        return 'just now';
    }   

    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
    }       

    if ($diff >= 60 && $diff < $intervals['hour'])
    {
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
    }       

    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
    {
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
    }   

    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
    {
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
    }   

    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
    {
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
    }   

    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
    {
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
    }   

    if ($diff >= $intervals['year'])
    {
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
    }
}
    require_once "db.php";
    require_once "twig.php";
    $error = false;
    $pesan = null;
    $post = '';
    if (! isset($_SESSION["profile_id"])) {
        echo $twig->render("login.html");
    }else { 
        $conn = konek_db();
        $query = $conn->prepare("select verify, email from profile where id = ?");
        $query->bind_param("i", $_SESSION['profile_id']);
        $query->execute();
        $query->bind_result($verify, $email);
        $query->fetch();
        $conn2 = konek_db();
             
            //eksekusi query untuk tarik data dari database
        $query2 = $conn2->prepare("select post.description, post.datetime, post.id, post.profile_id, post.image, profile.profile_pic, login.username from post LEFT JOIN profile ON profile.id = post.profile_id LEFT JOIN login ON login.profile_id = profile.id ORDER BY post.datetime DESC");
        $result = $query2->execute();
        $data = array();
        if (!$result){
            $error = true;
        }
        else {
            $rows = $query2->get_result();
            while ($row = $rows->fetch_array()) {
                if($row["profile_pic"] == null)
                    $profile_pic = "profile/no-pic.png";
                else
                    $profile_pic = "profile/" . $row["profile_pic"];
                $url_image = 'post/' . $row['image'];
                $desc = $row["description"];
                $postdate = time_passed(strtotime($row["datetime"]));
                $id = $row["id"];
                $profileid = $row["profile_id"];
                $username = $row["username"];
                $post = array("id"          =>$id,
                               "profile_id"  =>$profileid,
                               "profile_pic" =>$profile_pic,
                               "username"    =>$username,
                               "image"       =>$url_image,
                               "description" =>$desc,
                               "postdate"    =>$postdate);
                array_push($data, $post);
            }
        }
        $verification = array('verify' => $verify, 
                              'email'  => $email,
                              'error'  => $error);
        //tarik data ke result set
        echo $twig->render("home.html", array_merge(array("posts"=>$data),array("verify"=>$verification)));
        // echo $twig->render("home.html", array("posts"=>$data));
    }
?>