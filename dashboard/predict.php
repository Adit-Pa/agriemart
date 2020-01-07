<?php
require '../connection.php';



if($_SESSION['usertype']!='admin')
{
   echo '<script>window.location.href = "../index.php";</script>';
       
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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Agriemart || Admin
  </title>
  <!-- Favicon -->
  <link href="../assets/img/brand/logo.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css" rel="stylesheet" />
    <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.0.0/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-vis@1.0.2/dist/tfjs-vis.umd.min.js"></script>



  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />



  <script src="../model.js"></script>
  <script src="../index.js"></script>
<script type="text/javascript">
     <style>
        #hellobar-bar {
            font-family: "Open Sans", sans-serif;
            width: 100%;
            margin: 0;
            height: 30px;
            display: table;
            font-size: 17px;
            font-weight: 400;
        
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

.alert{
  margin-bottom:0px;
}</style>


     <script>
$('#verifymodal').modal('show'); 
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.0.0/dist/tf.min.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

</head>

<body >
  <?php


   $con=$GLOBALS['con']; 
    $userid=$_SESSION['userid'];
    $restotal=mysqli_query($con, "SELECT status FROM users");
    $total = mysqli_num_rows($restotal);

     $restotal=mysqli_query($con, "SELECT status FROM users WHERE status=0");
    $newuser = mysqli_num_rows($restotal);

    $restotal=mysqli_query($con, "SELECT status FROM users WHERE status=3");
    $olduser = mysqli_num_rows($restotal);
    $restotal=mysqli_query($con, "SELECT status FROM users WHERE status=2");
    $block = mysqli_num_rows($restotal);
        $restotal=mysqli_query($con, "SELECT status  FROM users WHERE status=2");
    $block = mysqli_num_rows($restotal);
        $restotal=mysqli_query($con, "SELECT status  FROM users WHERE status=1");
    $hold = mysqli_num_rows($restotal);


    
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

<?php 

?>
 
        <div id="hellobar-bar" class="regular closable">
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
        </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">languages</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="google_translate_element"></div>
                        <!-- Modal -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>



        
      
  



  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="../index.php">
        <img src="../assets/img/brand/logo.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="../assets/img/theme/<?php echo $profile; ?>">
              </span>
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
            <a href="../profile.php" class="dropdown-item">
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
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="index.html">
                <img src="assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
            <ul class="navbar-nav">
          <li class="nav-item  class=" active" ">
          <a class=" nav-link " href="calc_admin.php"> <i class="ni ni-tv-2 text-primary"></i> Calculator
            </a>
          </li>
                 <li class="nav-item">
            <a class="nav-link " href="vendor.php">
              <i class="ni ni-single-02 text-yellow"></i> Post
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  active " href="admin.php">
              <i class="ni ni-bullet-list-67 text-red"></i> User
            </a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link " href="predict.php">
              <i class="ni ni-chart-pie-35 text-primary"></i> Stock predictiom
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="predict.php">
              <i class="ni ni-chart-bar-32 text-red"></i> Price Prediction
            </a>
          </li>
             <li class="nav-item">
            <a class="nav-link " >
              <i class="ni ni-world-2 text-red"></i><button type="button" class="nav-link " data-toggle="modal" data-target="#exampleModal" data-hover="select your preferred language!!" style="background: transparent;border:none;padding:0px;">
                            language!!
                        </button>
            </a>
          </li>
     
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
          <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="https://agriemart.ml/">
              <i class="ni ni-shop"></i> Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../calc.php">
              <i class="ni ni-collection"></i> Subcidy
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../weather.php">
              <i class="ni ni-ui-04"></i> Weather
            </a>
          </li>
        </ul>
 
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        
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
              <a href="../profile.php" class="dropdown-item">
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
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
      
        </div>
      </div>
    </div>

    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Price Prediction</h3>
            </div>
            <div >


<div class="card shadow">
    <div class="card-body">
      <div class="nav-wrapper" >
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Fetch Data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>SMA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Train Model</a>
        </li>
         <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Predict Value</a>
        </li>
    </ul>
</div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                <div class="container" style="background-color:#e3f2fd">
<br>
      <div class="row" id="div_container_getdata">
        <br>
        <div class="col m4">
          <div class="input-field col s12">
           
            <input class="form-control" type="text" id="input_ticker" placeholder="example: MSFT" value="Wheat">
               <label for="input_apikey">Commodity Name</label>
           
          </div>
        </div>
        <div class="col m4">
          <div class="input-field col s12">
         
            <input class="form-control" type="text" id="input_apikey" placeholder="" value="">
             <label>You can claim your API key</label>
       
          </div>
        </div>
        <div class="col m4">

          <div class="input-field col s12">
            <select class="form-control" onchange="onClickChangeDataFreq(this)">
              <option value="Weekly" onchange="onClickChangeDataFreq('Weekly')" selected>Weekly</option>
              <option value="Daily" onchange="onClickChangeDataFreq('Daily')">Daily</option>
            </select>
            <label>Data Temporal Resolutions</label>
          </div>

          <!-- <div class="dropdown">
            <div class="input-field col s12">
              <label for="input_apikey">Data Temporal Resolutions</label>
              <button class="btn btn-secondary dropdown-toggle" type="button" id="input_datafreq" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Weekly
              </button>
              <div class="dropdown-menu" aria-labelledby="input_datafreq">
                <a class="dropdown-item" onclick="onClickChangeDataFreq('Weekly')">Weekly</a>
                <a class="dropdown-item" onclick="onClickChangeDataFreq('Daily')">Daily</a>
              </div>
            </div>
          </div> -->
        </div>
        <div class="col s12">
          <button class="btn btn-default" id="btn_fetch_data" onclick="onClickFetchData()">Fetch Data</button>
          <!-- <div class="spinner-border" id="load_fetch_data" style="display:none"></div> -->
                <button class="waves-effect waves-light btn" type="button" onclick="demo()" id="btn_load_demo">
        Load Snapshot Demo
      </button>
      <div id="div_demo_loaded" style="display:none">
        Demo loaded, scroll down to explore.
      </div>

          <div class="preloader-wrapper small active" id="load_fetch_data" style="display:none">
            <div class="spinner-layer spinner-green-only">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="row" id="div_container_linegraph" style="display:none">
        <div class="col s12">
          <div class="card z-depth-5">
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4" id="div_linegraph_data_title">Card Title<</span>
              <div >
                <div id="div_linegraph_data" style="width:100%; height:350px;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                             <div class="section" style="background-color:#e3f2fd" id="div_sma">
    <div class="container">
      <h1 class="header">Simple Moving Average</h1>
      <p class="lead"></p>
      <p>
        <!-- [purpose of this step, fun for the reader] -->
        For this experiment, we are using <a href="https://en.wikipedia.org/wiki/Supervised_learning" target="_blank">supervised learning</a>, which means feeding data to the neural network and it learns by mapping input data to the output label. One way to prepare the training dataset is to extract Simple Moving Average from that time series data.
      </p>
      <p>
        <a href="https://www.investopedia.com/terms/s/sma.asp" target="_blank">Simple Moving Average (SMA)</a> is a method to identify trends direction for a certain period of time, by looking at the average of all the values within that time window. The number of prices in a time window is selected experimentally.

        For example, let's assume the closing prices for past 5 days were 13, 15, 14, 16, 17, the SMA would be (13+15+14+16+17)/5 = 15. So the <i>input</i> for our training dataset is the set of prices within a single time window, and <i>label</i> is the computed moving average of those prices.
      </p>
    </div>

    <div class="container">

      <div class="row" id="div_container_getsmafirst">
        <div class="col s12">
          <p>But first, <a href="#div_data">fetch stocks data</a> from the previous step.</p>
        </div>
      </div>

      <div class="row" id="div_container_getsma" style="display:none">
        <div class="col s12">
          <p>
            <!-- [how to use, what you want your reader to do after you end, as simple and obvious] -->
            Let's generate the training dataset, hit on the <i>Compute SMA and Draw Chart</i> button to generate the training data for the neural network.
          </p>
        </div>
        <div class="col s6">
          <div class="input-field col s12">
            <label for="input_windowsize">Window Size</label>
            <input type="number" id="input_windowsize" placeholder="a number" value="50">
            <small class="form-text text-muted">This is the "time window" for SMA</small>
          </div>
        </div>
        <div class="col s12">
          <button class="btn btn-default" id="btn_draw_sma" onclick="onClickDisplaySMA()">Compute SMA and Draw Chart</button>
          <div class="spinner-border" id="load_draw_sma" style="display:none"></div>
        </div>
      </div>

      <div class="row" id="div_container_sma" style="display:none">
        <div class="col s12">
          <div class="card z-depth-5">
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4" id="div_linegraph_sma_title"></span>
                <div id="div_linegraph_sma" style="width:100%; height:350px;"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="div_container_trainingdata" style="display:none">
        <div class="col s12">
          <div class="card z-depth-5">
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4" id="div_linegraph_data_title">Training Data (top 25 rows)</span>
              <div style="overflow-x: scroll;" id="div_trainingdata">
            </div>
          </div>
          </div>
        </div>
      </div>

    </div>
  </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                 <div class="section" style="background-color:#e8f5e9" id="div_train">
    <div class="container">
      <h1 class="header">Train Neural Network</h1>
      <p class="lead"></p>
      <p>
        <!-- [purpose of this step, fun for the reader] -->
        Now that you have the training data, it is time to create a model for time series prediction, to achieve this we will use <a href="https://js.tensorflow.org/" target="_blank">TensorFlow.js</a> framework.
      </p>
      <p>
        <a href="https://js.tensorflow.org/api/latest/#sequential" target="_blank">Sequential model</a> is selected which simply connects each layer and pass the data from input to the output during the training process. In order for the model to learn time series data which are sequential, <a href="https://js.tensorflow.org/api/latest/#layers.rnn" target="_blank">recurrent neural network (RNN) layer</a> layer is created and a number of <a href="https://js.tensorflow.org/api/latest/#layers.lstmCell" target="_blank">LSTM cells</a> are added to the RNN.
      </p>
      <p>
        The model will be trained using <a href="https://js.tensorflow.org/api/latest/#train.adam" target="_blank">Adam</a> (<a href="https://arxiv.org/abs/1412.6980" target="_blank">read more</a>), a popular optimisation algorithm for machine learning. <a href="https://js.tensorflow.org/api/latest/#losses.meanSquaredError" target="_blank">Root-means-squared error</a> which determine the difference between predicted values and the actual values, so model is able to learn by minimising the error during the training process.
      </p>
      <p>
        <!-- [how to use, what you want your reader to do after you end, as simple and obvious] -->
        These are the hyperparameters (parameters used in the training process) available for tweaking:
        <ol>
          <li>Training Dataset Size (%): the amount of data used for training, and remaining data will be used for prediction</li>
          <li>Epochs: number of times the dataset is used to train the model (<a href="https://machinelearningmastery.com/difference-between-a-batch-and-an-epoch/" target="_blank">learn more</a>)</li>
          <li>Learning Rate: amount of change in the weights during training in each step (<a href="https://machinelearningmastery.com/learning-rate-for-deep-learning-neural-networks/" target="_blank">learn more</a>)</li>
          <li>Hidden LSTM Layers: to increase the model complexity to learn in higher dimensional space (<a href="https://machinelearningmastery.com/how-to-configure-the-number-of-layers-and-nodes-in-a-neural-network/" target="_blank">learn more</a>)</li>
        </ol>
      </p>
    </div>

    <div class="container">

      <div class="row" id="div_container_trainfirst">
        <div class="col s12">
          <p>Need training data? Explore the previous section to <a href="#div_sma">prepare training data</a>.</p>
        </div>
      </div>

      <div id="div_container_train" style="display:none">
        <div class="row">
          <div class="col s12">
            <p>
              <!-- [how to use, what you want your reader to do after you end, as simple and obvious] -->
              You may tweak the hyperparameters and then hit the <i>Begin Training Model</i> button to train the model.
            </p>
          </div>
          <div class="col s6">
            <div class="input-field col s12">
              <label for="input_trainingsize">Training Dataset Size (%)</label>
              <input type="number" id="input_trainingsize" placeholder="a number between (1-99)" value="70">
            </div>
          </div>
          <div class="col s6">
            <div class="input-field col s12">
              <label for="input_epochs">Epochs</label>
              <input type="number" id="input_epochs" placeholder="a number" value="50">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col s6">
            <div class="input-field col s12">
              <label for="input_learningrate">Learning Rate</label>
              <input type="number" id="input_learningrate" placeholder="a decimal" value="0.01">
              <small class="form-text text-muted">Typically range between 0.01 and 0.1</small>
            </div>
          </div>
          <div class="col s6">
            <div class="input-field col s12">
              <label for="input_hiddenlayers">Hidden LSTM Layers</label>
              <input type="number" id="input_hiddenlayers" placeholder="a number'" value="4">
              <small class="form-text text-muted">Number of LSTM layers</small>
            </div>
          </div>
          <div class="col s12">
            <button class="btn btn-default" id="btn_draw_trainmodel" onclick="onClickTrainModel()">Begin Training Model</button>
          </div>
        </div>
      </div>

      <div class="row" id="div_container_training" style="display:none">
        <div class="col s12">
          <div class="card z-depth-5">
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4" id="div_linegraph_data_title">Training Model</span>
              <h6>Progress</h6>
              <!-- <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" id="div_training_progressbar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
              </div> -->
              <div class="progress">
                <div class="determinate" id="div_training_progressbar" style="width: 100%"></div>
              </div>
              <hr/>
              <h6>Loss</h6>
              <div id="div_linegraph_trainloss" style="width:100%; height:250px;"></div>
              <hr/>
              <h6>Logs</h6>
              <div id="div_traininglog" style="overflow-x: scroll; overflow-y: scroll; height: 250px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
           <!-- PREDICT -->
  <div class="section" style="background-color:#fffde7">
    <div class="container">
      <h1 class="header">Prediction</h1>
      <p class="lead"></p>
      <p>
        <!-- [purpose of this step, fun for the reader] -->
        Now that you have trained your model, it is time to use it for predicting future values, for our case, it is the moving average. We are actually using the remaining data for prediction which allow us to see how closely our predicted values are compared to the actual values.
      </p>
    </div>

    <div class="container">

      <div class="row" id="div_container_predictfirst">
        <div class="col s12">
          <p>Don’t have a model to perform prediction? <a href="#div_train">Train your model</a>.</p>
        </div>
      </div>

      <div class="row" id="div_container_predict" style="display:none">
        <div class="col s12">
          <p>
            <!-- [how to use, what you want your reader to do after you end, as simple and obvious] -->
            Hit the <i>Make Prediction</i> button to see how this model performs. Whohoo!
          </p>
        </div>
        <div class="col s6">
          <button class="btn btn-default" id="btn_makeprediction" onclick="onClickValidate()">Make Prediction</button>
            <button class="btn btn-default" id="btn_makeprediction" onclick="onClickPredict()">Make P</button>
          <div class="spinner-border" id="load_predicting" style="display:none"></div>
        </div>
      </div>
      <div class="row" id="div_container_predicting" style="display:none">
        <div class="col s12">
          <div class="card z-depth-5">
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4" id="div_predict_title">Predict Results</span>
              <div id="div_predict_graph"></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
            </div>
        </div>
    </div>
</div>

                  
            </div>
           
          </div>
        </div>
      </div>
      <hr>
       
    
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0" style="color: #f5365c;">Warning</h3>
            </div>
            <div class="table-responsive">
           <!-- PREDICT -->
  <div class="section" style="background-color:#fffde7;color: #f5365c;">
    <div class="container">
     
      <p>
        <!-- [purpose of this step, fun for the reader] -->
        Training of model will take lots of time depends on your data,if you have low-end device then your device might be hang or unresponsive.we will note recommend to use this section in mobile device.
      </p>
    </div>

  </div>
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