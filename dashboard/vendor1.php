
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
   Agriemart || Explore
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css" rel="stylesheet" />



  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js"></script>
  <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false'></script>

</head>
<div class="modal fade" id="cont-not" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-"  role="document">
        <div class="modal-content "  >

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification" style="color: black;font-weight: bold;">Congratulations</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-satisfied ni-3x"></i>
                    <a href="" class="btn btn-lg btn-block btn-white" id="totalPayment">+91</a>
                    <br>
                    <p style="color:red;font-weight: bold;">* We are not taking any responsibility.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<body class="">

    <?php
    require '../connection.php';
     session_start();
     ob_start();
    
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
  
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.html">POST EXPLORE</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
          <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="../assets/img/theme/<?php echo $profile; ?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $fname." ".$lname; ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../profile.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href=../profile.php" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../profile.php" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../profile.php" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="../logout.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/farm4.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white"><?php echo $fname." ".$lname; ?></h1>
            <p class="text-white mt-0 mb-5">This is your Explore page. You can see the Post  that have posted by farmer.</p>
            <a href="../profile.php" class="btn btn-info">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7 justify-content-between">
      
     
    <?php 

 



   $result = mysqli_query($con, "SELECT * FROM post WHERE owner!='$userid'");

  
  while($post = mysqli_fetch_array($result))
  {
    $owner=$post['owner'];
      $result1 = mysqli_query($con, "SELECT * FROM users WHERE userid='$owner'");

  
  while($own = mysqli_fetch_array($result1))
  {

        echo '<div class="row d-flex ">
           <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0 float-right">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../assets/img/theme/'.$own['profile'].'" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
              
              <form id="'.$own['userid'].$userid.'">
                <input type="hidden" id="f" value="'.$own['userid'].'">
                <input type="hidden" id="t" value="'.$userid.'">
                <input type="submit" name="submit" id="flw" value="Follow" class="btn btn-sm btn-info mr-4"></form>
                <form method="post" action="vendor.php">
                <input type="hidden" name="userid" value="'.$own['userid'].'">

                <input type="submit" name="con" value="Contact" class="btn btn-sm btn-default float-right">
                </form>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center ">
                   
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  '.$own['fname'].' '.$own['lname'].'<span class="font-weight-light">, 27</span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>'.$post['lat'].' '.$post['lon'].'
                </div>
               
                <a href="#">Show more</a>
              </div>

            </div>
              <br><br><br>
            <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
            
              </div>
            </div>
           
            <div class="card-body pt-0 pt-md-4" id="map'.$post['postid'].'" style="height:300px;width:100%:">
          
            </div>



<script>
 $( document ).ready( function() {


  
  //Google Maps JS
  //Set Map
  function initialize() {
      var myLatlng = new google.maps.LatLng("'.$post['lat'].'","'.$post['lon'].'");
      var imagePath = "http://m.schuepfen.ch/icons/helveticons/black/60/Pin-location.png"
      var mapOptions = {
        zoom: 15,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }

    var map = new google.maps.Map(document.getElementById("map'.$post['postid'].'"), mapOptions);
    //Callout Content
    var contentString = "Some address here..";
    //Set window width + content
    var infowindow = new google.maps.InfoWindow({
      content: contentString,
      maxWidth: 500
    });

    //Add Marker
    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      icon: imagePath,
      title: "image title"
    });

    google.maps.event.addListener(marker, "click", function() {
      infowindow.open(map,marker);
    });

    //Resize Function
    google.maps.event.addDomListener(window, "resize", function() {
      var center = map.getCenter();
      google.maps.event.trigger(map, "resize");
      map.setCenter(center);
    });
  }

  google.maps.event.addDomListener(window, "load", initialize);

});
    
</script>
</div>
        
          </div>
        </div><div class="col-xl-8 order-xl-1 ">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">'.$post['crop'].'</h3>
                </div>
                <div class="col-4 text-right">';

               
                 if($post['owner']=$userid)
                  { echo '
                <form action="vendor.php" method="post">
                <input type="hidden" name="pid" value='.$post['postid'].'
                  <input type="submit" name="delete" value="Delete" class="btn btn-sm btn-primary"></form>';

                }
                  echo '
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
          
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <img src="../assets/img/post/'.$post['img'].'"  class="col-md-12" style=" padding: 0;
    display: block;
    margin: 0 auto;
    max-width: 100%;height:400px;">
                    </div>
                    
                  </div>
                
                </div>
                <hr class="my-4" />
                <!-- Address -->
            
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Description</label>
                         <p class="form-control form-control-alternative" >'.$post['desci'].'.</p>
                      </div>
                    </div>
              
                  </div>
              
                  <div class="row">
                    <div class="col-lg-4">
                  <div class="form-group">
                        <label class="form-control-label" for="input-address">Price</label>
                        <p class="form-control form-control-alternative" >'.$post['price'].'</p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>
                         <p class="form-control form-control-alternative" >'.$post['lat'].'</p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Distance</label>
                         <p class="form-control form-control-alternative" >'.$post['lon'].'KM</p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                    
                    </div>
                  </div>
                </div>
            
              
              </form>
            </div>
          </div>
        </div>
      </div>  <br>';

       } }?>

      
  </div>  


</div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-md-6">
                    <div class="copyright">
                        &copy; 2019 <a href="http://agriemart.ml/" target="_blank">Agriemart</a>.
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav nav-footer justify-content-end">
                        <li class="nav-item">
                            <a href="#team" class="nav-link" >Team</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.agriemart.ml/" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="license.txt" class="nav-link" target="_blank">MIT License</a>
                        </li>
                    </ul>
                </div>
        </div>
      </footer>

  


</body>
1

<script>
        $(document).ready(function(){
            $("#flw").click(function(){
                var f1=$("#f").val();
                var t1=$("#t").val();
                var id="#"+f1+t1;
                $.ajax({
                    url:'follow.php',
                    method:'POST',
                    data:{
                        f:f1,
                        t:t1
                    },
                   success:function(data){
                     
                     window.location.href = "vendor.php";
                   }
                });
            });
        });
    </script>
</html>
<?php 

if(isset($_POST['delete']))
{
  $pid=$_POST['pid'];
  $sql="DELETE * FROM post WHERE owner='$userid' AND postid='$pid'";
  if(mysqli_query($con,$sql))
  {
    echo '<script>alert("delete");</script>';
  }
  else{
     echo '<script>alert("delete fail");</script>';
  }
}

if(isset($_POST['con']))
{
  $u=$_POST['userid'];
$result = mysqli_query($con, "SELECT * FROM users where userid='$u'");
$res = mysqli_fetch_array($result);

        echo'<script> $("#cont-not").modal("show");document.getElementById("totalPayment").innerHTML = "+91'.$res['mobile'].'";</script>';
 
}
?>