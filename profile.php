<?php
    session_start();
    require_once "db.php";
    require_once "twig.php";
    if(!isset($_GET["id"]) && !isset($_SESSION["profile_id"])){
        header("Location:login.php");
    }else if(isset($_GET["id"])){
        $id = $_GET["id"];
    }else if(!isset($_GET["id"])){
        if(isset($_SESSION["profile_id"])){
            $id = $_SESSION["profile_id"];
        }
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
    if($row->profile_pic == null || $row->profile_pic == '')
        $profile_pic = "profile/no-pic.png";
    else {
        $profile_pic = "profile/" . $row->profile_pic; 
    }
    if($id == $_SESSION["profile_id"]){
        $profil = array('job' => $row->job,
                         'name' => $row->fullname,
                         'dob' => $row->dateofbirth,
                         'phone' => $row->phone,
                         'email' => $row->email,
                         'website' => $row->website,
                         'profile_pic' => $profile_pic,
                         'description' => $row->description,
                         'match' => 1);
    }else {
        $profil = array('job' => $row->job,
                         'name' => $row->fullname,
                         'dob' => $row->dateofbirth,
                         'phone' => $row->phone,
                         'email' => $row->email,
                         'website' => $row->website,
                         'profile_pic' => $profile_pic,
                         'description' => $row->description,
                         'match' => 0);
    }

    $query = $conn->prepare("select * , count(post_like.post_id) as like_count, 
                                count(post_comment.post_id) as comment_count from post
                                LEFT JOIN post_like ON post_like.post_id = post.id
                                LEFT JOIN post_comment ON post_comment.post_id = post.id
                                where profile_id = ?
                                group by post_like.post_id");
    $query->bind_param("i", $id);
    $result = $query->execute();

    if (!$result)
        die("Gagal Query");

    //tarik data ke result set
    $rows = $query->get_result();
    $data = array();
    while ($row = $rows->fetch_array()) { 
        $source = "Post/" . $row['image'];
        $like = $row['like_count'];
        $comment = $row['comment_count'];
        $post = array("img"     =>$source,
                      "like"    =>$like,
                      "comment" =>$comment);
        array_push($data, $post);
    }

     echo $twig->render("profile.html", array_merge(array("posts"=>$data),array("profile"=>$profil)));
     ?>