<?php
require '../connection.php';
 $data = file_get_contents('ex.json');
$json_arr = json_decode($data, true);


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


if(isset($_POST['update']))
  {
         $json_arr['eq'][$_POST['id']]['mx'] = $_POST['mx'];
         $json_arr['eq'][$_POST['id']]['pr'] = $_POST['pr'];   
         file_put_contents('ex.json', json_encode($json_arr));
  }



if(isset($_POST['delete_sub']))
  {
         unset($json_arr['eq'][$_POST['id']]);  
         file_put_contents('ex.json', json_encode($json_arr));
  }


if(isset($_POST['add_sub']))
  {
      $json_arr['eq'][$_POST['eq']]['mx']=$_POST['mx']; 
       $json_arr['eq'][$_POST['eq']]['pr']=$_POST['pr']; 
         file_put_contents('ex.json', json_encode($json_arr));
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
              <h3 class="mb-0">Subsidy Calculator </h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                 
                    <th scope="col">Equipment</th>
                    <th scope="col">percentage</th>
                    <th scope="col">Max</th>
                    <th scope="col"></th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php 


                    foreach ($json_arr['eq'] as $key => $value) {
                        $id=$key;
                        $mx=intval($value['mx']);
                        $pr=intval($value['pr']);
    echo ' <form action="calc_admin.php" method="POST">
    <input type="hidden" value="'.$id.'" name="id">
                   <tr>
                        <th scope="row">
                      <div class="media align-items-center">
                     
                        <div class="media-body">
                          <span class="mb-0 text-sm">'.$id.'</span>
                        </div>
                      </div>
                    </th>
                    <td>
                    <input class="form-control"  name="pr" type="text" value="'.$pr.'">
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <input class="form-control"   name="mx" type="text" value="'.$mx.'">
                         
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                      <input class="btn btn-info" value="Update" name="update" type="submit">
                       <input class="btn btn-default" value="Delete" name="delete_sub" type="submit">
                      </div>
                    </td>
                  
                  
                  </tr>
              </form>';
}
                  ?>
<form action="calc_admin.php" method="POST">
    <input type="hidden" value="'.$id.'" name="id">
                   <tr>
                        <th scope="row">
                      <div class="media align-items-center">
                     
                        <div class="media-body">
                          <input class="form-control"  name="eq" type="text" value="Equipment name">
                        </div>
                      </div>
                    </th>
                    <td>
                    <input class="form-control"  name="pr" type="text" >
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <input class="form-control"   name="mx" type="text" >
                         
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                       <input class="btn btn-default" value="ADD" name="add_sub" type="submit">
                      </div>
                    </td>
                  
                  
                  </tr>
              </form>
               
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
             
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

      $url='http://world.msg91.com/api/sendhttp.php?authkey=3409ArfrOEgxa6C65d651751&mobiles='.$mobile.'&message=your%20account%20has%20been%20verified%20successfully%2C%20You%20can%20now%20use%20Agriemart.ml%20.&sender=AGRIEMART&route=1&country=91&flash=0&unicode=0&response=response%3Djson&campaign=Notification';
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