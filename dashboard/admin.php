<?php
require '../connection.php';



if($_SESSION['usertype']!='admin')
{
   echo '<script>window.location.href = "../index.php";</script>';
       
}

if(isset($_POST['delete']))
{
  $user=$_POST['user'];
    $sql="DELETE FROM users WHERE userid='$user'";
      $res=mysqli_query($con,$sql);
     if($res)
        {   
           $_SESSION['msg']="User deleted successfully. ";
                $_SESSION['style']="alert-success";
                $_SESSION['count']= 1;
             
                 echo '<script>window.location.href = "admin.php";</script>';
        }
        else{
           
               $_SESSION['msg']="Sorry ,Server Not connected ,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                  echo '<script>window.location.href = "admin.php";</script>';
        }
     }   



     if(isset($_POST['block']))
{
  $user=$_POST['user'];
   $result = mysqli_query($con, "UPDATE users SET status=2 WHERE userid='$user'");

     if($result)
        {   
                $_SESSION['msg']="User block successfully. ";
                $_SESSION['style']="alert-success";
                $_SESSION['count']= 1;
             
                 echo '<script>window.location.href = "admin.php";</script>';
        }
        else{
            $_SESSION['msg']="Sorry ,Server Not connected ,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                  echo '<script>window.location.href = "admin.php";</script>';
        }
     } 



          if(isset($_POST['hold']))
{
  $user=$_POST['user'];
   $result = mysqli_query($con, "UPDATE users SET status=1 WHERE userid='$user'");

     if($result)
        {   
               $_SESSION['msg']="User hase put on hold. ";
                $_SESSION['style']="alert-success";
                $_SESSION['count']= 1;
             
                 echo '<script>window.location.href = "admin.php";</script>';
        }
        else{
             $_SESSION['msg']="Sorry ,Server Not connected ,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                  echo '<script>window.location.href = "admin.php";</script>';
        }
     } 


          if(isset($_POST['unhold']))
{
  $user=$_POST['user'];
   $result = mysqli_query($con, "UPDATE users SET status=0 WHERE userid='$user'");

     if($result)
        {   
                $_SESSION['msg']="User unhold successfully. ";
                $_SESSION['style']="alert-success";
                $_SESSION['count']= 1;
             
                 echo '<script>window.location.href = "admin.php";</script>';
        }
        else{
             $_SESSION['msg']="Sorry ,Server Not connected ,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                  echo '<script>window.location.href = "admin.php";</script>';
        }
     } 



          if(isset($_POST['unblock']))
{
  $user=$_POST['user'];
   $result = mysqli_query($con, "UPDATE users SET status=0 WHERE userid='$user'");

     if($result)
        {   $_SESSION['msg']="User unblock successfully. ";
                $_SESSION['style']="alert-success";
                $_SESSION['count']= 1;
             
                 echo '<script>window.location.href = "admin.php";</script>';
        }
        else{
            $_SESSION['msg']="Sorry ,Server Not connected ,Try again. ";
                $_SESSION['style']="alert-danger";
                $_SESSION['count']= 1;
                  echo '<script>window.location.href = "admin.php";</script>';
        }
     } 




    ?>

    <?php

    
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

<?php require'adminh.php'; ?>

    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">New User </h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">7-12</th>
                    <th scope="col">Completion</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php    $result = mysqli_query($con, "SELECT * FROM users where status=0");

  
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
  if($res['kyc'] != null)
  {
    $kyc='yes';
  }
  else
  {
    $kyc='no';
  }
 
                echo ' <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">'.$fname.' '.$lname.'</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      '.$type.'
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> '.$mobile.'
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <span class="mb-0 text-sm">'.$kyc.'</span>
                      
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">60%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <form method="post" action="admin.php">
                            <input type="hidden" name="user" value='.$userid.'>
                            <input  class="dropdown-item" type="submit" name="delete" value="Delete">
                            </form>
                             <form method="post" action="admin.php">
                            <input type="hidden" name="user" value='.$userid.'>
                            <input  class="dropdown-item" type="submit" name="hold" value="Put on Hold">
                            </form>
                             <form method="post" action="admin.php">
                            <input type="hidden" name="user" value='.$userid.'>
                            <input  class="dropdown-item" type="submit" name="block" value="Block">
                            </form>
                            <form  method="post" action="admin.php">
                             <input type="hidden" name="user" value='.$userid.'>
                            <input type="hidden" name="kycimg" value='.$res['kyc'].'>

                            <input  class="dropdown-item" type="submit"  name="verify" value="verify" >
                            </form>
                   
                        </div>
                      </div>
                    </td>
                  </tr>';}
                  ?>
                  
                  <tr>
              
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <hr>
        <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Old User </h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">7-12</th>
                    <th scope="col">Completion</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php    $result = mysqli_query($con, "SELECT * FROM users where status=3");

  
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
 
                echo ' <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">'.$fname.' '.$lname.'</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      Farmer
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> '.$mobile.'
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <span class="mb-0 text-sm">Yes</span>
                      
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">100%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                           <form method="post" action="admin.php">
                            <input type="hidden" name="user" value='.$userid.'>
                            <input  class="dropdown-item" type="submit" name="delete" value="Delete">
                            </form>
                             <form method="post" action="admin.php">
                            <input type="hidden" name="user" value='.$userid.'>
                            <input  class="dropdown-item" type="submit" name="hold" value="Put on Hold">
                            </form>
                             <form method="post" action="admin.php">
                            <input type="hidden" name="user" value='.$userid.'>
                            <input  class="dropdown-item" type="submit" name="block" value="Block">
                            </form>
                        </div>
                      </div>
                    </td>
                  </tr>';}
                  ?>
                  
                  <tr>
              
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Hold User </h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">7-12</th>
                    <th scope="col">Completion</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php    $result = mysqli_query($con, "SELECT * FROM users where status=1");

  
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
  if(isset($res['kyc']))
  {
    $kyc='yes';
  }
  else
  {
    $kyc='no';
  }
 
                echo ' <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">'.$fname.' '.$lname.'</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      '.$type.'
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> '.$mobile.'
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <span class="mb-0 text-sm">'.$kyc.'</span>
                      
                      </div>
                    </td>
                    <td>
                     <div class="d-flex align-items-center">
                        <span class="mr-2">100%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <form method="post" action="admin.php">
                            <input type="hidden" name="user" value='.$userid.'>
                            <input  class="dropdown-item" type="submit" name="unhold" value="Un Hold">
                            </form>
                        
                         
                        </div>
                      </div>
                    </td>
                  </tr>';}
                  ?>
                  
                  <tr>
              
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Block User </h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">7-12</th>
                    <th scope="col">Completion</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php    $result = mysqli_query($con, "SELECT * FROM users where status=2");

  
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
  if(isset($res['kyc']))
  {
    $kyc='yes';
  }
  else
  {
    $kyc='no';
  }
 
                echo ' <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">'.$fname.' '.$lname.'</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      '.$type.'
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> '.$mobile.'
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <span class="mb-0 text-sm">'.$kyc.'</span>
                      
                      </div>
                    </td>
                    <td>
                       <div class="d-flex align-items-center">
                        <span class="mr-2">100%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <form method="post" action="admin.php">
                            <input type="hidden" name="user" value='.$userid.'>
                            <input  class="dropdown-item" type="submit" name="unblock" value="Un Block">
                            </form>
                           
                   
                        </div>
                      </div>
                    </td>
                  </tr>';}
                  ?>
                  
                  <tr>
              
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <hr>
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
    </div>
  </div>
 


      
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    
   <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script>
        $(window).load(function() {

            $(".goog-logo-link").empty();
            $('.goog-te-gadget').html($('.goog-te-gadget').children());

        })
    </script>



  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
   <script type="text/javascript">
        
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
    </script>
        <script type="text/javascript">
      function closealert()
      {
        $('#hellobar-bar').fadeOut();
      
      }

       $('#hellobar-bar').fadeOut(3500);
    </script>




</body>

</html>
<?php

if(isset($_POST['verify']))
{
$userid=$_POST['user'];
$kycimg=$_POST['kycimg'];
$_COOCKIE['kimg']=$kycimg;
echo '<div class="modal fade" id="verifymodal" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-default">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Verify user</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                  <img src="../assets/img/kyc/';
            if($kycimg !=null)
              {
                echo $kycimg;
                }
                else{
                  echo "kyc.jpg";
                  } echo'" width="300" height="300">
                    
                </div>

            </div>

            <div class="modal-footer">
            <a href="../assets/img/kyc/';
            if($kycimg !=null)
              {
                echo $kycimg;
                }
                else{
                  echo "kyc.jpg";
                  } echo'"  
                 target="_blank"><button  class="btn btn-white" >View large</button></a>
                <form action="admin.php" method="post"><input type="hidden" name="userid" value="'.$userid.'"><input type="submit" class="btn btn-white" name="verifyuser" value="Verify"></form>
                 
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>

  </div>';
echo '<script>$("#verifymodal").modal("show"); 
</script>';
}
if(isset($_POST['verifyuser']))
{
  $user=$_POST['userid'];
   $result = mysqli_query($con, "UPDATE users SET status=3 WHERE userid='$user'");

     if($result)
        {   
          //$res = mysqli_query($con, "SELECT mobile FROM users WHERE userid='$user'");
  
              $result = mysqli_query($con, "SELECT * FROM users where userid='$user'");

            
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
            }
           echo '<script>alert("'.$mobile.'")</script>';

      $url='http://world.msg91.com/api/sendhttp.php?authkey=3409ArfrOEgxa6C65d651751&mobiles='.$mobile.'&message=your%20account%20has%20been%20verified%20successfully%2C%20You%20can%20now%20use%20Agriemart.ml%20.&sender=AGRIEM&route=4&country=91&flash=0&unicode=0&response=response%3Djson&campaign=Notification';
      $json = file_get_contents($url); 
    ;
      if($json){
    echo '<script>alert("User successfully Verified  and Notified")</script>';
       echo '<script>window.location.href = "admin.php";</script>';

    }
             
                 
        }
        else{
             echo '<script>alert(" fail ")</script>';
        }
}
?>