
<!DOCTYPE html>
<html>
<head>
    <title>Login | <?= $site_name;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="img/logo1.ico"/>
    <!--Global styles -->
    <link type="text/css" rel="stylesheet" href="css/components.css" />
    <link type="text/css" rel="stylesheet" href="css/custom.css" />
    <!--End of Global styles -->
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="vendors/bootstrapvalidator/css/bootstrapValidator.min.css"/>
    <link type="text/css" rel="stylesheet" href="vendors/wow/css/animate.css"/>
    <!--End of Plugin styles-->
    <link type="text/css" rel="stylesheet" href="css/pages/login1.css"/>
</head>
<body>
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="img/loader.gif" style=" width: 40px;" alt="loading...">
    </div>
</div>
<div class="container wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2s">
    <div class="row">
        <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-10 push-sm-1 login_top_bottom">
            <div class="row">
                <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-12">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center">
                            <br><span class="text-white"> <?= $site_name;?></span>
                        </h3>
                    </div>
                    <div class="bg-white login_content login_border_radius">
                        <form action="structure/login.php" id="login_validator" method="post" class="login_validator">
                            <div class="form-group">
                                <label for="email" class="col-form-label"> Username</label>
                                <div class="input-group">
                                    <span class="input-group-addon input_email"><i
                                            class="fa fa-user text-primary"></i></span>
                                    <input type="text" class="form-control  form-control-md" id="username" name="username" placeholder="Username">
                                </div>
                            </div>
                            <!--</h3>-->
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon addon_password"><i
                                            class="fa fa-lock text-primary"></i></span>
                                    <input type="password" class="form-control form-control-md" id="password"   name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="submit" value="Log In" class="btn btn-primary btn-block login_button">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/tether.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- end of global js-->
<!--Plugin js-->
<script type="text/javascript" src="vendors/bootstrapvalidator/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="vendors/wow/js/wow.min.js"></script>
<!--End of plugin js-->
<script type="text/javascript" src="js/pages/login1.js"></script>
</body>

</html>