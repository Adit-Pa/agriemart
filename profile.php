<?php

require 'connection.php';
  

    $userid=$_SESSION['userid'];
if(isset($_SESSION['login']))
{

}
else{
 echo '<script>window.location.href = "index.php";</script>';
}

if(isset($_POST['update']))
{


 
	$fname1 = $_POST['fname'];
	$lname1 = $_POST['lname'];
	$email1 = $_POST['email'];
	$adrs1 = $_POST['adrs'];
	$type = $_POST['type'];
	$userid1 = $_POST['userid'];

	

	  $result = mysqli_query($con, "UPDATE users SET fname='$fname1',lname='$lname1',email='$email1',adrs='$adrs1',
										userid='$userid1',type='$type' WHERE userid='$userid'");
        if($result)
        {   
          
                unset($_SESSION['count']);

                    $_SESSION['msg']="You have successfully updated your personal deatils. ";
                $_SESSION['style']="alert-success";
                $_SESSION['count']= 1;

               
        
                 echo '<script>window.location.href = "profile.php";</script>';
        }
        else{
             $_SESSION['msg']="Sorry ,Server Not connected ,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                 echo '<script>window.location.href = "profile.php";</script>';
        }
}

if(isset($_POST['upload']))
{
        $uploaddir = 'assets/img/kyc/';
          $types = array('image/jpeg', 'image/gif','image/png');
          $uploadfile = $uploaddir . basename($_FILES['kyc']['name']);
          $img=$_FILES['kyc']['name'];


  if (in_array($_FILES['kyc']['type'], $types))
                {
                 if (move_uploaded_file($_FILES['kyc']['tmp_name'], $uploadfile)) 
                 {

                       $result = mysqli_query($con, "UPDATE users SET kyc='$img' WHERE userid='$userid'");
        if($result)
        {   
               
                
                unset($_SESSION['count']);

                    $_SESSION['msg']="Congratulations  You have successfully posted crop post. ";
                $_SESSION['style']="alert-success";
                $_SESSION['count']= 1;

               
        
                 echo '<script>window.location.href = "profile.php";</script>';

               
        
                 echo '<script>window.location.href = "profile.php";</script>';
        }
        else{
            
               $_SESSION['msg']="Sorry ,Server Not connected ,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                 echo '<script>window.location.href = "profile.php";</script>';
        }
                }
                else{
                      unset($_SESSION['count']);
                    
                      $_SESSION['msg']="Ooops System error,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                 echo '<script>window.location.href = "profile.php";</script>';
                }
    
}
else{
      unset($_SESSION['count']);
       $_SESSION['msg']="Please Upload valid file. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                 echo '<script>window.location.href = "profile.php";</script>';
}
}

//upload crop

if(isset($_POST['post']))
{


 
    $cname1 = $_POST['crop'];
    $price1 = $_POST['price'];
    $desci1 = $_POST['descii'];

   $lat=$_COOKIE['lat'];
$long=$_COOKIE['long'];
  $uploaddir = 'assets/img/post/';
          $types = array('image/jpeg', 'image/gif','image/png');
          $uploadfile = $uploaddir . basename($_FILES['img']['name']);
          $img=$_FILES['img']['name'];


  if (in_array($_FILES['img']['type'], $types))
                {
                 if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) 
                 {$sql="INSERT INTO post VALUES(DEFAULT,'$desci1','$cname1','$price1','$userid','$long','$lat','$img')";

                       $result = mysqli_query($con, $sql);
        if($result)
        {   
                unset($_SESSION['count']);

                    $_SESSION['msg']="Congratulations  You have successfully posted crop post. ";
                $_SESSION['style']="alert-success";
                $_SESSION['count']= 1;

               
        
                 echo '<script>window.location.href = "profile.php";</script>';
        }
        else{
             
               $_SESSION['msg']="Sorry ,Server Not connected ,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                 echo '<script>window.location.href = "profile.php";</script>';
        }
                }
                else{
                         unset($_SESSION['count']);
                    
                      $_SESSION['msg']="Ooops System error,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                 echo '<script>window.location.href = "profile.php";</script>';
                }
    
}
else{
    unset($_SESSION['count']);
       $_SESSION['msg']="Please Upload valid file. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                 echo '<script>window.location.href = "profile.php";</script>';
}

    
}
if(isset($_POST['profilepicu']))
{
      $uploaddir = 'assets/img/theme/';
          $types = array('image/jpeg', 'image/gif','image/png');
          $uploadfile = $uploaddir . basename($_FILES['profilepic']['name']);
          $img=$_FILES['profilepic']['name'];


  if (in_array($_FILES['profilepic']['type'], $types))
                {
                 if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $uploadfile)) 
                 {$result = mysqli_query($con, "UPDATE users SET profile='$img' WHERE userid='$userid'");

                      
        if($result)
        {     unset($_SESSION['count']);

                    $_SESSION['msg']="Upload  successfully ";
                $_SESSION['style']="alert-success";
                $_SESSION['count']= 1;

               
        
                 echo '<script>window.location.href = "profile.php";</script>';
        }
        else{
              unset($_SESSION['count']);
            
               $_SESSION['msg']="Sorry ,Server Not connected ,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                 echo '<script>window.location.href = "profile.php";</script>';
        }
                }
                else{
                      unset($_SESSION['count']);
                    
                      $_SESSION['msg']="Ooops System error,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                 echo '<script>window.location.href = "profile.php";</script>';
                }
    
}
else{
    
     unset($_SESSION['count']);
       $_SESSION['msg']="Please Upload valid file. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                 echo '<script>window.location.href = "profile.php";</script>';
}

}
  
?>
<!--
 -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="desciription" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Agriemart || Profile</title>
      <!-- Favicon -->
    <link href="assets/img/brand/logo.png" rel="icon" type="image/png">
         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css">

   

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">

    
    <!-- Argon CSS -->
    <link type="text/css" href="assets/css/argon.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f13b79bff4.js"></script>

      <style>
        #hellobar-bar {
            font-family: "Open Sans", sans-serif;
            width: 100%;
            margin: 0;
            height: 30px;
            display: table;
            font-size: 17px;
            font-weight: 400;
            padding: .33em .5em;
            -webkit-font-smoothing: antialiased;
            color: #5c5e60;
            position: fixed;
            bottom: 0px;
            background-color: white;
            box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.15);
            z-index: 15;
        }

        #hellobar-bar.regular {
            height: 30px;
            font-size: 14px;
            padding: .2em .5em;
        }

        .hb-content-wrapper {
            text-align: center;
            text-align: center;
            position: relative;
            display: table-cell;
            vertical-align: middle;
        }

        .hb-content-wrapper p {
            margin-top: 0;
            margin-bottom: 0;
        }

        .hb-text-wrapper {
            margin-right: .67em;
            display: inline-block;
            line-height: 1.3;
        }

        .hb-text-wrapper .hb-headline-text {
            font-size: 1em;
            display: inline-block;
            vertical-align: middle;
        }

        #hellobar-bar .hb-cta {
            display: inline-block;
            vertical-align: middle;
            margin: 5px 0;
            color: #ffffff;
            background-color: #0099cc;
            border-color: #0099cc;
        }

        .hb-close-wrapper {
            display: table-cell;
            width: 1.6em;
        }

        .hb-close-wrapper .icon-close {
            font-size: 14px;
            top: 15px;
            right: 25px;
            width: 15px;
            height: 15px;
            opacity: .3;
            color: #000;
            cursor: pointer;
            position: absolute;
            text-align: center;
            line-height: 15px;

            text-decoration: none;
        }


    .nav-link .nav-link-inner--text{
        color: black;
        font-weight: bold;
        font-size: 16px;
        font-family: "Maven Pro", sans-serif;
        }
    
    .one-edge-shadow {
    
    border-bottom: 1px solid #f0f0f0;
       
}
    .headroom--not-top{
        background-color: white !important;
        }
    
        .navbar-nav .dropdown-menu:before{
            left: 4px;
        }



/*  google translate baanner*/
.goog-te-banner-frame.skiptranslate
{
    display: none !important;
} .goog-logo-link
{
    
    display: none !important;
} 

.goog-te-combo{
    border: 2px solid black;
    border-radius: 5px;
}
div.goog-te-gadget {
  color: transparent !important;
    
}
body 
{
    top: 0px !important; 
}
hr{
        border-top: .0625rem solid rgba(0, 0, 0,0);
}
.navbar-main{
    background-color: transparent;
}


/*  card-profile */
.profile-page .card-profile {
margin-top: -300px;}

.mar-4
{
    padding-bottom: 4rem
}
.mar-0{
    padding-bottom: 0rem

}
.navbar-transparent{
    background-color: white;
}

.headroom--pinned {
    z-index: 1050;}
    </style>

      <script type="text/javascript">
 

        var lat;
        var long;
        let l = "lat";
        let lo = "long";
        navigator.geolocation.getCurrentPosition(function(position) {
            lat = position.coords.latitude;
            long = position.coords.longitude;
            document.cookie = l + '=' + lat;
            document.cookie = lo + '=' + long;

        });

    </script>
</head>


<?php
/*session_start();
if(!isset($_SESSION['name']))
{
	//header("Location:profile.php");
	$temp=10;
}*/
   
    
    $userid=$_SESSION['userid']; 
  $result = mysqli_query($con, "SELECT * FROM users where userid='$userid'");

  
  while($res = mysqli_fetch_array($result))
  {
	$id=$res['id'];
	$userid=$res['userid'];
	$type=$res['type'];
	$fname=$res['fname'];
	$lname=$res['lname'];
	$email=$res['email'];
	$mobile=$res['mobile'];
	$pass=$res['pass'];
	$adrs=$res['adrs'];
    $status=$res['status'];
    $profile=$res['profile'];
  }
   
?>
   

<body style="background-color: #172b4d;">


 <?php require("header.php");
    require("modal.php");?>   

  <main class="profile-page">
        <section class="section-profile-cover section-shaped my-0" style="margin-bottom: 0px;">
  <?php $count=$_SESSION['count'];

   if($count <= 2 && $count > 0)
    {
         $_SESSION['count']= $_SESSION['count']+1;
        echo '     <div class="alert '.$_SESSION['style'].' alert-dismissible fade show" id="alert" role="alert" style="margin-top:88px; ">
    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-inner--text"><strong>'.$_SESSION['msg'].'</span></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';

}else{}
?>
               
        </section>

        
        <section class="section" style="margin-bottom: 150px;">

            <div class="container">

                <div class="card card-profile shadow mt--300">

                    <div class="px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                  <form>
                                   
                                        <img src="assets/img/theme/<?php echo $profile; ?>" class="rounded-circle">

                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                                <div class="card-profile-actions py-4 mt-lg-0">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                        <input  class="btn btn-sm btn-default" style="width: 100px;" type="file" name="profilepic">
                                    <input class="btn btn-sm btn-default float-right" type="submit" name="profilepicu" value="Upload">
                                    <!--<a href="#" class="btn btn-sm btn-default float-right">Message</a>-->
                                </form>
                                    <!--  <a href="#" class="btn btn-sm  btn-info float-center">Connect</a>
                                    <a href="#" class="btn btn-sm btn-default float-right">Message</a>-->
                                </div>
                            </div>
                            <div class="col-lg-4 order-lg-1">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="desciription">Followers</span>
                                    </div>
                                    <div>
                                        <span class="heading">80</span>
                                        <span class="desciription">Post</span>
                                    </div>
                                    <div>
                                        <span class="heading">19</span>
                                        <span class="desciription">Sold</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="First Name" name="fname" type="text" value="<?php echo $fname; ?>"  >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                                </div>
                                                <input class="form-control"  placeholder="Last Name" name="lname" type="text" value="<?php echo $lname; ?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="User Type" name="type" type="text" 
                                              value="<?php echo $type; ?>" readonly="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Email" name="email" type="text" value="<?php echo $email; ?>"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <textarea class="form-control" placeholder="Adress.." name="adrs" ><?php echo $adrs; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Userid" name="userid" type="text" value="<?php echo $userid; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-tablet-button"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Mobile No" type="text" name="mobile" value="<?php echo $mobile; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                       
                                    </div>
                                    <div class="col-md-6"><div class="form-group">
                                        <div class="col-md-4">
                                        </div>
                                         <div class="col-md-4">
                                        </div>
                                         <div class="col-md-4">
                                            
                                            
                                                <input class="form-control btn btn-default " name="update" type="submit" value="Update">
                                            
                                       
                                        </div>
                                        </div>
                                        
                                    </div>
                                </div>

                            </form>
                        </div>
                       
                    </div>
                    
                </div>
            </div>
            
        </section>


         <section class="section"  style="padding-bottom: <?php if($status<3){}else{echo'0';}?>rem;?>">
            <hr >
            <div class="container">
                <div class="card card-profile shadow ">
                    <div class="px-4">
                     
                 <center style="padding-top: 15px;
    padding-bottom: 15px;">   <span class="heading" id="kyctitle" style="width: auto;font-weight: bold;">Upload your 7-12 document here</span></center>
                        <div class="text-center " id="kyctab">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-tablet-button"></i></span>
                                                </div>
                                                <input class="form-control"  type="file" name="kyc" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"><div class="form-group">
                                        <div class="col-md-4">
                                        </div>
                                         <div class="col-md-4">
                                        </div>
                                         <div class="col-md-4">
                                            
                                            
                                                <input class="form-control btn btn-default " name="upload" type="submit" value="Upload">
                                            
                                       
                                        </div>
                                        </div>
                                        
                                    </div>
                                </div>

                            </form>
                        </div>
                       
                    </div>
                   
                </div>
            </div>
            
        </section>
                    











<!-- crop deatils -->


         <section class="section"  id="c">
         <br style="margin-top: 2rem;
    margin-bottom: 2rem;" id="kyctab"> <br id="kyctab"><hr id="kyctab">
            <div class="container">
                <div class="card card-profile shadow ">
                    <div class="px-4">
                     
                 <center style="padding-top: 15px;
    padding-bottom: 15px;">   <span class="heading" id="croptitle" style="width: auto;font-weight: bold;">Upload your Crop Details</span></center>
                        <div class="text-center " id="croptab">
                           <div class="text-center mt-5">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Crop Name" name="crop" type="text" value="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Add Price"  name="price" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <textarea class="form-control" placeholder="Add Description" name="descii" value=" "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control"  name="img" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                
                                                <input class="form-control btn btn-default " name="post" type="submit" value="Post">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                </form>
                                </div>
                        </div>
                       
                    </div>
                   
                </div>
            </div>
            
        </section>












        <!-- 

      post

    -->
             <?php    $result = mysqli_query($con, "SELECT * FROM post where owner='$userid'");

  
  while($res = mysqli_fetch_array($result))
  {
  
 
                echo '<section class="section" id="croptab1"  ><br id="croptab1"></br>
<br id="croptab1"></br>
<br id="croptab1"></br>
<hr id="croptab1">
      <div class="container">
        <div class="card card-profile shadow mt--300" >
          <div class="px-4">
            <div class="row justify-content-center" >
              <div class="col-lg-3" >
                <div class="card-profile-image" >
                  <a href="#">
                    <img src="assets/img/theme/'.$profile.'"  style="width: 60px;transform: translate(-40%, 40%);" class="rounded-circle" >
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                <div class="card-profile-actions py-4 mt-lg-0" style="margin-top: 40px;padding: 0px !important;"><form method="post" action="profile.php">
                <input type="hidden" name="id" value="'.$res[postid].'">
                <input  class="btn btn-sm btn-default float-right" type="submit" name="delete" value="Delete">
          
                 
                </div>
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                    <span class="heading">'.$res['owner'].'</span>
                    
                  </div>
               
                  
                </div>
              </div>
            </div>
            <div class="text-center mt-5">
              <img src="assets/img/post/'.$res['img'].'"  style=" padding: 0;
    display: block;
    margin: 0 auto;
    max-height: 100%;
    max-width: 100%;">
            </div>
            <div class="mt-5 py-5 border-top text-center">
                <form action="profile.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="postid" value="'.$res['postid'].'">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Crop Name" name="crop" type="text" value="'.$res['crop'].'" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Add Price"  name="price" type="text" value="'.$res['price'].'">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="row">
                                <div class="col-md-6">
                                      <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input type="textarea" class="form-control" placeholder="Add Description" name="desci" value="'.$res['desci'].'">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                
                                                <input class="form-control btn btn-default " name="updatepost" type="submit" value="UPDATE">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    
                                   
                                </div>
                                
                                </form>
            </div>
          </div>
        </div>
      </div>
    </section>';}
                  ?>


      <?php

  if($status<3)
       {
              echo '<script>document.getElementById("croptab").remove();</script>';   
              echo '<script>document.getElementById("croptab1").remove();</script>';   
          
              echo '<script>document.getElementById("croptitle").innerHTML = "Verify your 7-12 document for  more feature.";</script>';
       }
       else{
        echo '<script>$("#c").addClass("mar-0");</script>';
        echo '<script>document.getElementById("kyctab").remove();</script>';
        echo '<script>document.getElementById("kyctitle").innerHTML = "Your kyc has already done.";</script>';
       }
 ?>
     <?php

  if($type=='Vendor')
       {
              echo '<script>document.getElementById("croptab").remove();</script>'; 
          echo '<script>document.getElementById("c").remove();</script>'; 
        echo '<script>document.getElementById("kyctab").remove();</script>';
        echo '<script>document.getElementById("kyctitle").innerHTML = "Your functionality are limited now.";</script>';
       }
       else{

       }
         if($type=='admin')
       {
              echo '<script>document.getElementById("croptab").remove();</script>'; 
          echo '<script>document.getElementById("c").remove();</script>'; 
        echo '<script>document.getElementById("kyctab").remove();</script>';
        echo '<script>document.getElementById("kyctitle").innerHTML = "Your functionality are limited now";</script>';
       }
       else{

       }
 ?>
    </main>
     <?php require("footer.php");?>
     <script type="text/javascript">
       $("#alert").fadeOut(4000);
     </script>
     
    <script type="text/javascript">
        
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
    </script>

</body></html>
<?php 

if(isset($_POST['delete']))
{

  $id=$_POST['id'];
  //deleting the row from table
$result = mysqli_query($con, "DELETE FROM post WHERE `postid`=$id");


if($result)
        {   
                unset($_SESSION['count']);

                    $_SESSION['msg']="Congratulations  You have successfully deleted crop post. ";
                $_SESSION['style']="alert-success";
                $_SESSION['count']= 1;
                }
                else{
             
               $_SESSION['msg']="Sorry ,Server Not connected ,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                 echo '<script>window.location.href = "profile.php";</script>';
        }

//redirecting to the display page (index.php in our case)
echo '<script>window.location.href = "profile.php";</script>';
}

if(isset($_POST['updatepost']))
{
  $postid=$_POST['postid'];
  $price=$_POST['price'];
  $desci=$_POST['desci'];
  $name=$_POST['crop'];

  $result = mysqli_query($con, "UPDATE post SET desci='$desci',crop='$name',price='$price' WHERE postid='$postid'");

  if($result)
        {   
          
                unset($_SESSION['count']);

                    $_SESSION['msg']="You have successfully updated your crop deatils. ";
                $_SESSION['style']="alert-success";
                $_SESSION['count']= 1;

               
        
                 echo '<script>window.location.href = "profile.php";</script>';
        }
        else{
             $_SESSION['msg']="Sorry ,Server Not connected ,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                 echo '<script>window.location.href = "profile.php";</script>';
        }
}
?>