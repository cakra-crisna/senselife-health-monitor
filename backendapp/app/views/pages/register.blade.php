<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>SenseLife | Register</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin register -->
        <div class="register register-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="assets/img/bg4.jpg" alt="" style="width:100%;height:100%" />
                </div>
                <div class="news-caption">
                    <h4 class="caption-title"><i class="fa fa-stethoscope text-success"></i> Announcing SenseLife</h4>
                    <p>
                        Download the SenseLife App to use your wearables without being worried about changing new devices.
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin register-header -->
                <h1 class="register-header">
                    Sign Up
                    <small>Create your SenseLife Account today and Integrate all of your wearable devices in one place. It’s free and always will be.</small>
                </h1>
                <!-- end register-header -->
                <!-- begin register-content -->
                <div class="register-content">
                    <form action="/register" method="POST" class="margin-bottom-0">
                        <label class="control-label">Name</label>
                        <div class="row row-space-10">
                            <div class="col-md-6 m-b-15">
                                <input name="firstname" type="text" class="form-control" placeholder="First name"  required="true" />
                            </div>
                            <div class="col-md-6 m-b-15">
                                <input name="lastname" type="text" class="form-control" placeholder="Last name"  required="true" />
                            </div>
                        </div>
                        <input type="hidden" name="usertype" value="patient" />
                        <label class="control-label">Email</label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="text" name="email" class="form-control" placeholder="Email address"  required="true" />
                            </div>
                        </div>
                        <label class="control-label">Re-enter Email</label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Re-enter email address"  required="true" />
                            </div>
                        </div>
                        <label class="control-label">Password</label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="password" type="password" class="form-control" placeholder="Password" required="true" />
                            </div>
                        </div>
                        
                        
                        <div class="checkbox m-b-30">
                            <label>
                                <input type="checkbox" /> By clicking Sign Up, you agree to our <a href="register_v3.html#">Terms</a> and that you have read our <a href="register_v3.html#">Data Policy</a>, including our <a href="register_v3.html#">Cookie Use</a>.
                            </label>
                        </div>
                        <div class="register-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40">
                            Already a member? Click <a href="/login">here</a> to login.
                        </div>
                        <hr />
                        <p class="text-center text-inverse">
                            &copy; SenseLife All Right Reserved 2016
                        </p>
                    </form>
                </div>
                <!-- end register-content -->
            </div>
            <!-- end right-content -->
        </div>
        <!-- end register -->
        
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>

</body>
</html>
