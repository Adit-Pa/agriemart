<?php 

require('function.php');  
if(isset($_POST['login']))
{

    login();

}
if(isset($_POST['signup']))
{
    signup();
}
if(isset($_POST['forgot']))
{
    forgot($_POST['mobile']);
}
?>
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



        <div id="hellobar-bar" class="regular closable">
            <div class="hb-content-wrapper">
                <div class="hb-text-wrapper">
                    <span></span>&nbsp;<span><button type="button" class="btn custom-btn" data-toggle="modal" data-target="#exampleModal" data-hover="select your preferred language!!">
                            select your preferred language!!
                        </button></span>
                </div>


            </div>
            <div class="hb-close-wrapper">
                <a href="javascript:void(0);" class="icon-close" onClick="$('#hellobar-bar').fadeOut()">&#10006;</a>
            </div>
        </div>
      






        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default" style="color: #172b4d;">Login Here</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="  Userid" type="text"  name="userid" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="  Password" type="password" name="password"   
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                </div>
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                <label class="custom-control-label" for=" customCheckLogin"><span>Remember me</span></label>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="login" class="btn-default my-4" value="Sign in">
                            </div>
                        </form>

                    </div>

                    <div class="modal-footer">
                        <button  class="btn-default"  style="background-color: transparent;border: none;color: #007bff;margin: 0px;" onclick="forgot()">Forgot Password</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Register Here</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                             <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        
                             <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user "></i></span>
                                    </div>
                                    <input class="form-control" placeholder="  userid"   type="text" name="userid" required>
                                </div>

                            </div>

                             <div class="form-group ">
                                <div class="input-group input-group-alternative" style="    vertical-align: middle;
    align-content: center;
    align-items: center;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;
                              <div class="custom-control custom-radio">
  <input name="type" class="custom-control-input" id="customRadio1"  type="radio" value="farmer" required>>
  <label class="custom-control-label" for="customRadio1">Farmer</label>
</div>
&nbsp;&nbsp;&nbsp;
<div class="custom-control custom-radio">
  <input name="type" class="custom-control-input" id="customRadio2"  type="radio" value="Vendor">

  <label class="custom-control-label" for="customRadio2">Vendor</label>
</div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="  Password" type="password" 
                                   name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                </div>
                            </div>
                                <div class="form-group mb-3">
                                   
                                <div class="input-group input-group-alternative">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone-square "></i></span>
                                    </div>

                                    <input class="form-control" placeholder="  Mobile No"  pattern="[7-9]{1}[0-9]{9}" 
       title="Phone number with 7-9 and remaing 9 digit with 0-9" type="text" name="mobno" required></input><input type="submit" style="width: 100px;" name="signup" class="btn-default" value="Sign Up">
                                </div> 

                            </div>
                                
                          
                        </form>

                    </div>

                    <div class="modal-footer">
                    </div>

                </div>
            </div>
        </div>

<!--calculator  notification-->
<div class="modal fade" id="calc-not" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
                
                    <hr>
                        <p >You will get this much amount of subsidy.</p>
                    <a href="" class="btn btn-lg btn-block btn-white" id="totalPayment">Rs. </a>
                    <br>
                    <p style="color:red;font-weight: bold;">* Information has been generated according to the central government sources.</p>
                </div>

            </div>

            <div class="modal-footer">
               
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>





<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default" style="color: #172b4d;">Login Here</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Mobile" type="text"  name="mobile" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <center><input type="submit" name="forgot" class="btn-default my-4" value="Send OTP"> </center>
                                </div>
                            </div>
                           
                        </form>

                    </div>

                    

                </div>
            </div>
        </div>
<script type="text/javascript">
    
    function forgot()
    {
        $("#login").modal("hide");
        $("#forgot").modal("show");
    }
</script>