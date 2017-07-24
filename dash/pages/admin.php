<?php
session_start();
if (!isset($_SESSION['logged']) || $_SESSION['logged'] == false) {
    header('location: ../../404.html');
} else if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
	$conn = null;
	require ('scripts/acceptor.php');
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM Admins WHERE username = '$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        if ($row = $result->fetch_array()) {
            ?>
			<!doctype html>
			<html lang="en">
			<head>
				<meta charset="utf-8"/>
				<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-img.png"/>
				<link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png"/>
				<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
				<title>SM. Dukan Admin Panel</title>
				<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'
				      name='viewport'/>
				<meta name="viewport" content="width=device-width"/>
				<!-- Bootstrap core CSS     -->
				<link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
				<!--  Material Dashboard CSS    -->
				<link href="../assets/css/turbo.css" rel="stylesheet"/>
				<!--  CSS for Demo Purpose, don't include it in your project     -->
				<link href="../assets/css/demo.css" rel="stylesheet"/>
				<!--     Fonts and icons     -->
				<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
				      rel="stylesheet">
				<link rel="stylesheet" type="text/css"
				      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"/>
				<link href="../assets/vendors/material-design-iconic-font/dist/css/material-design-iconic-font.min.css?v=1"
				      rel="stylesheet">

				<link href="../assets/vendors/dropzone/dropzone.min.css" rel="stylesheet">
				<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.css">
			</head>
			<body>
			<div class="wrapper">
				<div class="sidebar" data-background-color="gray">
					<div class="logo">
						<a href="admin.php" class="simple-text">
							SM. Dukan Admin
						</a>
					</div>
					<div class="logo logo-mini">
						<a href="admin.php" class="simple-text">
							SM.D
						</a>
					</div>
					<div class="sidebar-wrapper">
						<ul class="nav">
							<li>
								<a>
									<i class="dash fa fa-tachometer"></i>
									<p class="dash">Dashboard</p>
								</a>
							</li>
							<li>
								<a data-toggle="collapse" href="#entries" class="collapsed" aria-expanded="false">
									<i class="fa fa-pencil"></i>
									<p>Entries
										<b class="caret"></b>
									</p>
								</a>
								<div class="collapse" id="entries" aria-expanded="false" style="height: 0px;">
									<ul class="nav">
										<li><a class="installmentEntries">Installment Entries</a></li>
										<li><a class="balanceSEntries">Balance Sheet Entries</a></li>
									</ul>
								</div>
							</li>
							<li>
								<a data-toggle="collapse" href="#tables" class="collapsed" aria-expanded="false">
									<i class="fa fa-table"></i>
									<p>Tables
										<b class="caret"></b>
									</p>
								</a>
								<div class="collapse" id="tables" aria-expanded="false" style="height: 0px;">
									<ul class="nav">
										<li><a class="dataSheet">Data Sheet</a></li>
										<li><a class="balanceSheet">Balance Sheet</a></li>
									</ul>
								</div>
							</li>
							<li>
								<a data-toggle="collapse" href="#pages" class="collapsed" aria-expanded="false">
									<i class="fa fa-file-text"></i>
									<p>Pages
										<b class="caret"></b>
									</p>
								</a>
								<div class="collapse" id="pages" aria-expanded="false" style="height: 0px;">
									<ul class="nav">
										<li><a class="userProfile">User Profile</a></li>
										<li><a class="settings">Settings</a></li>
										<?php
										if ($row[13] ==1) {
                                            ?>
											<li><a onclick="adminMaker()">Admin Manager</a></li>
                                            <?php
                                        }
										?>
									</ul>
								</div>
							</li>
							<li>
								<a>
									<i class="fa fa-sign-out logout"></i>
									<p class="logout">Logout</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="main-panel">
					<nav class="navbar navbar-default navbar-absolute">
						<div class="container-fluid">
							<div class="navbar-minimize">
								<button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
									<i class="fa fa-angle-left visible-on-sidebar-regular f-26"></i>
									<i class="fa fa-angle-right visible-on-sidebar-mini f-26"></i>
								</button>
							</div>
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<!--Change with jQuery dynamically-->
								<a class="navbar-brand" href="admin.php" id="change"> Admin Section </a>
							</div>
							<div class="collapse navbar-collapse">
								<ul class="nav navbar-nav navbar-right">
									<li class="userProfile">
										<a class="userProfile">
                                            <?php
                                            if (empty($row[10])) {
                                                echo '<i class="fa fa-user userProfile"></i>';
                                            } else {
                                                echo '<img height="27" width="27" style="border-radius: 100%; display: inline-block;" src="scripts/showimage.php?id='.$row[0].'"/>';
                                            }
                                            ?>
											<!--Show profile photo and redirect to user profile page-->
											<p class="hidden-lg hidden-md userProfile" style="display: inline-block; margin-left:15px" onclick="userprofile()">Profile</p>
										</a>
									</li>
									<li class="settings">
										<a class="settings">

											<i class="fa fa-cog settings"></i>
											<!--Redirect to settings page-->
											<p class="hidden-lg hidden-md settings" onclick="settings()">Settings</p>
										</a>
									</li>
									<li class="separator hidden-lg hidden-md"></li>
								</ul>
							</div>
						</div>
					</nav>
					<div class="content">
						<div class="container-fluid">
							<div class="row">
								<div class="jumbotron text-center">
									<h2 style="font-size: 2.8em">Welcome,
                                        <?php
                                        echo $row[3] . " " . $row[4];
                                        ?>!</h2>
									<!--Loads dashboard-->
									<p><a class="btn btn-success btn-lg dash" role="button">Enter Dashboard</a></p>
								</div>
							</div>
						</div>
					</div>
					<footer class="footer">
						<div class="container-fluid">
							<nav class="pull-left">
								<ul>
									<li>
										<a class="logout">
											Go to Homepage
										</a>
									</li>
								</ul>
							</nav>
							<p class="copyright pull-right">
								&copy;
								<script>
                                    document.write(new Date().getFullYear())
								</script>
								Developed by <a href="https://www.linkedin.com/in/ahmedbaig1/"><em>AhmedBaig</em></a>
							</p>
						</div>
					</footer>
				</div>
				<div class="fixed-plugin">
					<div class="dropdown show-dropdown">
						<a href="#" data-toggle="dropdown" aria-expanded="false">
							<i class="fa fa-cog fa-2x"> </i>
						</a>
						<ul class="dropdown-menu">
							<li class="header-title"> Topbar Filters</li>
							<li class="adjustments-line">
								<a href="javascript:void(0)" class="switch-trigger active-color">
									<div class="badge-colors text-center">
										<span class="badge filter badge-default" data-color="default"></span>
										<span class="badge filter badge-blue" data-color="blue"></span>
										<span class="badge filter badge-green" data-color="green"></span>
										<span class="badge filter badge-yellow" data-color="yellow"></span>
										<span class="badge filter badge-red" data-color="red"></span>
										<span class="badge filter badge-white" data-color="white"></span>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
							<li class="header-title">Sidebar Background</li>
							<li class="adjustments-line">
								<a href="javascript:void(0)" class="switch-trigger background-color">
									<div class="text-center">
										<span class="badge filter badge-gray" data-color="gray"></span>
										<span class="badge filter badge-white" data-color="default"></span>
									</div>
									<div class="clearfix"></div>
								</a>
							</li>
							<li class="adjustments-line">
								<a href="javascript:void(0)" class="switch-trigger">
									<p>Sidebar Mini</p>
									<div class="togglebutton switch-sidebar-mini">
										<label>
											<input type="checkbox" unchecked>
										</label>

									</div>
									<div class="clearfix"></div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			</body>
			<script>
                function adminMaker() {
                    $('#change').text('Admin Maker');
                    $('#change').prop('href', '#');
                    $('.content').empty();
                    $('.content').load('pages/adminMaker.php');
                }
                function settings() {
                    $('#change').text('Settings');
                    $('#change').prop('href', '#');
                    $('.content').empty();
                    $('.content').load('pages/settings.php');
                }
                function userprofile() {
                    $('#change').text('User Profile');
                    $('#change').prop('href', '#');
                    $('.content').empty();
                    $('.content').load('pages/userProfile.php');
                }
			</script>
			<script type="text/javascript">
                $(document).ready(function () {
                    // Javascript method's body can be found in assets/js/demos.js
                    demo.initVectorMap();
                });
			</script>
			<script>
                $(document).ready(function () {
                    demo.initFormExtendedDatetimepickers();
                });
			</script>
			<script>
                document.getElementById('dat').value = new Date().getDate();
			</script>
			<!--   Core JS Files   -->
			<script src="../assets/vendors/jquery-3.1.1.min.js" type="text/javascript"></script>
			<script src="../assets/vendors/jquery-ui.min.js" type="text/javascript"></script>
			<script src="../assets/vendors/bootstrap.min.js" type="text/javascript"></script>
			<script src="../assets/vendors/material.min.js" type="text/javascript"></script>
			<script src="../assets/vendors/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
			<!-- Forms Validations Plugin -->
			<script src="../assets/vendors/jquery.validate.min.js"></script>
			<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
			<script src="../assets/vendors/moment.min.js"></script>
			<!--  Plugin for the Wizard -->
			<script src="../assets/vendors/jquery.bootstrap-wizard.js"></script>
			<!--  Notifications Plugin    -->
			<script src="../assets/vendors/bootstrap-notify.js"></script>
			<!-- DateTimePicker Plugin -->
			<script src="../assets/vendors/bootstrap-datetimepicker.js"></script>
			<!-- Vector Map plugin -->
			<script src="../assets/vendors/jquery-jvectormap.js"></script>
			<!-- Sliders Plugin -->
			<script src="../assets/vendors/nouislider.min.js"></script>
			<!--  Google Maps Plugin    -->
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAurmSUEQDwY86-wOG3kCp855tCI8lHL-I"></script>
			<!-- Select Plugin -->
			<script src="../assets/vendors/jquery.select-bootstrap.js"></script>
			<!--  DataTables.net Plugin    -->
			<script src="../assets/vendors/jquery.datatables.js"></script>
			<!-- Sweet Alert 2 plugin -->
			<script src="../assets/vendors/sweetalert2.js"></script>
			<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
			<script src="../assets/vendors/jasny-bootstrap.min.js"></script>
			<!--  Full Calendar Plugin    -->
			<script src="../assets/vendors/fullcalendar.min.js"></script>
			<!-- TagsInput Plugin -->
			<script src="../assets/vendors/jquery.tagsinput.js"></script>
			<!-- Material Dashboard javascript methods -->
			<script src="../assets/js/turbo.js"></script>
			<!-- Material Dashboard DEMO methods, don't include it in your project! -->
			<script src="../assets/js/demo.js"></script>
			<!-- onload Plugin -->
			<script src="../assets/js/onload.js"></script>
			<!--DropZone JS-->
			<script src="../assets/vendors/dropzone/dropzone.min.js"></script>
			</html>
            <?php
        } else {
        	echo "FATAL ERROR!";
        }
    } else {
        echo "No data in database";
    }
}
?>