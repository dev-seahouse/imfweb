<?php
include_once(dirname(__FILE__) . "/controllers/processPostJob.php");

/*if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {l

	$phpjobappid = $_POST['phpjobappid'];
	$phpjobid = $_POST['phpjobid'];

	//--- Connection string -----
	include('otokirusama.php');
	$connection=mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("Database Offline");
	//---------------------------

	$phpjobappid = stripslashes($phpjobappid);
	$phpjobappid = mysql_real_escape_string($phpjobappid);

	$sql = "UPDATE jobapplicant_t SET CheckIn=NOW() WHERE JobAppID='$phpjobappid'";
	mysql_query($sql);

	//Cheat code below to change jobstatus to 2 (close), so that this jobID will not appear in "View Posted Job" page anymore.
	$sql = "UPDATE job_t SET JobStatus=2 WHERE jobid='$phpjobid'";
	mysql_query($sql);

	mysql_close($connection);
} else {
	$phpjobid = $_GET['jobid'];
	session_start();
	$phphotelid = 1; //TO-DO: Replace '1' with SESSION_HOTELID. Example: $phphotelid = $_SESSION['hotelid'];

	//--- Connection string -----
	include('otokirusama.php');
	$connection=mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("Database Offline");
	//---------------------------

	$phpjobid = stripslashes($phpjobid);
	$phpjobid = mysql_real_escape_string($phpjobid);

	$sql = "SELECT * FROM user_t, job_t, jobapplicant_t, scope_t WHERE user_t.userid = jobapplicant_t.userid AND job_t.jobid = jobapplicant_t.jobid AND MarkAsPresent='A' AND job_t.scopeid = scope_t.scopeid AND CheckIn IS NULL AND jobapplicant_t.jobid='$phpjobid' AND job_t.hotelid='$phphotelid'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);

	$tbody_data = "";
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			$tbody_data.='<tr>';
			$tbody_data.='    <td>'.$row['Firstname']." ".$row['Lastname'].'</td>';
			$tbody_data.='    <td>'.$row['NRIC'].'</td>';
			$tbody_data.='    <td>'.$row['ScopeName'].'</td>';
			$tbody_data.='    <td>'.date("d M Y", strtotime($row['JobDate'])).'</td>';
			$tbody_data.='    <td>'.date("h:i A", strtotime($row['JobStartTime'])).'</td>';
			$tbody_data.='    <td>'.date("h:i A", strtotime($row['JobEndTime'])).'</td>';
			$tbody_data.='    <td>'.$row['MobileNo'].'</td>';
			$tbody_data.='    <td>';
			$tbody_data.='        <div class="text-center">';
			$tbody_data.='            <input type="checkbox" name="attendance" onClick="updateCheckIn('.$row['JobAppID'].')" />';
			$tbody_data.='        </div>';
			$tbody_data.='    </td>';
			$tbody_data.='</tr>';
		}
	}
	mysql_close($connection);
}*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>IMF Management Application - Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <!-- Application icon -->
    <!--     <link href='assets/images/meta_icons/favicon.ico' rel='shortcut icon' type='image/x-icon'>
    <link href='assets/images/meta_icons/apple-touch-icon.png' rel='apple-touch-icon-precomposed'>
    <link href='assets/images/meta_icons/apple-touch-icon-57x57.png' rel='apple-touch-icon-precomposed' sizes='57x57'>
    <link href='assets/images/meta_icons/apple-touch-icon-72x72.png' rel='apple-touch-icon-precomposed' sizes='72x72'>
    <link href='assets/images/meta_icons/apple-touch-icon-114x114.png' rel='apple-touch-icon-precomposed' sizes='114x114'>
    <link href='assets/images/meta_icons/apple-touch-icon-144x144.png' rel='apple-touch-icon-precomposed' sizes='144x144'>
    -->
    <!-- / START - page related stylesheets [optional] -->
    <!-- End of application icons -->
    <!-- ===========================================  =============================== -->
    <!-- / bootstrap-->
    <link href="assets/stylesheets/bootstrap/bootstrap.min.css" media="all" rel="stylesheet" type="text/css"/>
    <!-- / theme file -->
    <link href="assets/stylesheets/demo.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" media="all" href="assets/stylesheets/imftheme.css">
    <!--- =============   Customise theme File     ================================== -->
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/main.css">
    <!--[if lt IE 9]>
    <script src="assets/javascripts/compatibility/html5shiv.js" type="text/javascript"></script>
    <script src="assets/javascripts/compatibility/response.min.js" type="text/javascript"></script>
    <![endif]-->
</head>
<body class='contrast-blue without-footer fixed-header fixed-navigation'>
<header>
<nav class='navbar navbar-default navbar-fixed-top'>
<a class='navbar-brand' href='dashboard.html'>

    <!--<img width="81" height="21" class="logo" alt="Flatty" src="assets/images/logo.svg" />
    <img width="21" height="21" class="logo-xs" alt="Flatty" src="assets/images/logo_xs.svg" />
    -->
</a>
<a class='toggle-nav btn pull-left' href='#'> <i class='icon-reorder'></i>
</a>
<!-- ====================     Nav Class      =================== -->
<ul class='nav'>
    <!-- ==================== Theme Color Changer ================== -->
    <li class='dropdown light only-icon'>
        <a class='dropdown-toggle' data-toggle='dropdown' href='#'> <i class='icon-cog'></i>
        </a>
        <ul class='dropdown-menu color-settings'>
            <li class='color-settings-contrast-color'>
                <div class='color-title'>Select Theme</div>
                <a data-change-to="contrast-red" href="#">
                    <i class='icon-cog text-red'></i>
                    Red
                    <small>(default)</small>
                </a>

                <a data-change-to="contrast-blue" href="#">
                    <i class='icon-cog text-blue'></i>
                    Blue
                </a>

                <a data-change-to="contrast-orange" href="#">
                    <i class='icon-cog text-orange'></i>
                    Orange
                </a>

                <a data-change-to="contrast-purple" href="#">
                    <i class='icon-cog text-purple'></i>
                    Purple
                </a>

                <a data-change-to="contrast-green" href="#">
                    <i class='icon-cog text-green'></i>
                    Green
                </a>

                <a data-change-to="contrast-muted" href="#">
                    <i class='icon-cog text-muted'></i>
                    Muted
                </a>

                <a data-change-to="contrast-fb" href="#">
                    <i class='icon-cog text-fb'></i>
                    Facebook
                </a>

                <a data-change-to="contrast-dark" href="#">
                    <i class='icon-cog text-dark'></i>
                    Dark
                </a>

                <a data-change-to="contrast-pink" href="#">
                    <i class='icon-cog text-pink'></i>
                    Pink
                </a>

                <a data-change-to="contrast-grass-green" href="#">
                    <i class='icon-cog text-grass-green'></i>
                    Grass green
                </a>

                <a data-change-to="contrast-sea-blue" href="#">
                    <i class='icon-cog text-sea-blue'></i>
                    Sea blue
                </a>

                <a data-change-to="contrast-banana" href="#">
                    <i class='icon-cog text-banana'></i>
                    Banana
                </a>

                <a data-change-to="contrast-dark-orange" href="#">
                    <i class='icon-cog text-dark-orange'></i>
                    Dark orange
                </a>

                <a data-change-to="contrast-brown" href="#">
                    <i class='icon-cog text-brown'></i>
                    Brown
                </a>

            </li>
        </ul>
    </li>
    <!-- ================= End of theme color changer ============= -->
    <!-- ================= Notification Dropdown + Widget box ============== -->
    <li class='dropdown medium only-icon widget'>
        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-rss'></i>

            <div class='label'>5</div>
        </a>
        <ul class='dropdown-menu'>
            <li>
                <a href='#'>
                    <div class='widget-body'>
                        <div class='pull-left icon'>
                            <i class='icon-user text-success'></i>
                        </div>
                        <div class='pull-left text'>
                            Steven Sim applied waiter position
                            <small class='text-muted'>just now</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class='divider'></li>
            <li>
                <a href='#'>
                    <div class='widget-body'>
                        <div class='pull-left icon'>
                            <i class='icon-user text-success'></i>
                        </div>
                        <div class='pull-left text'>
                            Jolin Tan applied cleaner position
                            <small class='text-muted'>1 hours ago</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class='divider'></li>
            <li>
                <a href='#'>
                    <div class='widget-body'>
                        <div class='pull-left icon'>
                            <i class='icon-user text-danger'></i>
                        </div>
                        <div class='pull-left text'>
                            Mhamd Nazrin has cancelled her waiter position.
                            <small class='text-muted'>2 hour ago</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class='divider'></li>
            <li>
                <a href='#'>
                    <div class='widget-body'>
                        <div class='pull-left icon'>
                            <i class='icon-user text-success'></i>
                        </div>
                        <div class='pull-left text'>
                            Jane applied cleaner job
                            <small class='text-muted'>last week</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class='divider'></li>
            <li>
                <a href='#'>
                    <div class='widget-body'>
                        <div class='pull-left icon'>
                            <i class='icon-suitcase text-error'></i>
                        </div>
                        <div class='pull-left text'>
                            New kichen assistant job has been created
                            <small class='text-muted'>1 month ago</small>
                        </div>
                    </div>
                </a>
            </li>
            <li class='widget-footer'>
                <a href='#'>All notifications</a>
            </li>
        </ul>
    </li>

    <!-- ====================== End of notification dropdown + Widget Box =========== -->
    <!-- ====================== Top Right Profile menu Dropdown ===================== -->
    <li class='dropdown dark user-menu'>
        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <!-- ==================================================================               
            <img width="23" height="23" alt="company" src="assets/images/avatar.jpg" />
            -->
            <span class='user-name'>Regent Hotel</span> <b class='caret'></b>
        </a>
        <ul class='dropdown-menu'>
            <li>
                <a href='user_profile.php'>
                    <i class='icon-user'></i>
                    Profile
                </a>
            </li>
            <li>
                <a href='user_profile.php'>
                    <i class='icon-cog'></i>
                    Settings
                </a>
            </li>
            <li class='divider'></li>
            <li>
                <a href='index.php'>
                    <i class='icon-signout'></i>
                    Sign out
                </a>
            </li>
        </ul>
    </li>
    <!-- ====================== End of Top Right Profile menu Dropdown ===================== --> </ul>
<!-- ====================== End of nav class======================== ===================== -->
<!-- ======================== Search Button ============================================== -->
<!--       <form action='search_results.html' class='navbar-form navbar-right hidden-xs' method='get'>
<button class='btn btn-link icon-search' name='button' type='submit'></button>
<div class='form-group'>
  <input value="" class="form-control" placeholder="Search..." autocomplete="off" id="q_header" name="q" type="text" />
</div>
</form>
-->
</nav>
<!-- ===================== End of nav section =================================== -->
</header>
<div id='wrapper'>
<div id='main-nav-bg'></div>
<nav id='main-nav' class="main-nav-fixed">
    <div class='navigation'>
        <!-- ======================= Hidden search button for mobile ====================== -->
        <!--         <div class='search'>
        <form action='search_results.html' method='get'>
          <div class='search-wrapper'>
            <input value="" class="search-query form-control" placeholder="Search..." autocomplete="off" name="q" type="text" />
            <button class='btn btn-link icon-search' name='button' type='submit'></button>
          </div>
        </form>
      </div>
      -->
        <!-- ====================  End of serach button for mobile ======================== -->
        <!-- ====================  Left side navigation starts here ======================= -->
        <ul class='nav nav-stacked'>
            <li class=''>
                <a href='dashboard.html'>
                    <i class='icon-dashboard'></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class=''>
                <a href="postjob.php">
                    <i class='icon-plus'></i>
                    <span>Post New Job</span>
                </a>
            </li>
            <li class=''>
                <a href="#">
                    <i class='icon-remove'></i>
                    <span>Cancel Job</span>
                </a>
            </li>
            <li class=''>
                <a href='viewjob.html'>
                    <i class='icon-suitcase'></i>
                    <span>View Posted Job</span>
                </a>
            </li>
            <li class=''>
                <a href="#">
                    <i class='icon-calendar'></i>
                    <span>Plan Future Job</span>
                </a>
            </li>
            <li class=''>
                <a href="#">
                    <i class='icon-user'></i>
                    <span>Manage Job Applications</span>
                </a>
            </li>
            <li class=''>
                <a href="attendance.php">
                    <i class='icon-check'></i>
                    <span>Mark Attendance</span>
                </a>
            </li>
            <li class=''>
                <a href="#">
                    <i class='icon-usd'></i>
                    <span>Manage Pay</span>
                </a>
            </li>
            <li class=''>
                <a class="dropdown-collapse" href="#">
                    <i class='icon-star-half-empty'></i>
                    <span>Manage Feedback</span>
                    <i class='icon-angle-down angle-down'></i>
                </a>

                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='#'>
                            <i class='icon-edit'></i>
                            <span>Review Rating</span>
                        </a>
                    </li>
                    <li class=''>
                        <a href='#'>
                            <i class='icon-plus'></i>
                            <span>Add Testimonial</span>
                        </a>
                    </li>
                    <li class=''>
                        <a href='#'>
                            <i class='icon-edit'></i>
                            <span>Review Testimonial</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=''>
                <a href="contact.html">
                    <i class='icon-envelope'></i>
                    <span>Contact Support</span>
                </a>
            </li>
            <li class=''>
                <a href="#">
                    <i class='icon-signout'></i>
                    <span>Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<section id='content'>
<div class='container'>
<div class='row' id='content-wrapper'>
<!-- Main Column -->
<div class='col-xs-12'>
<!--col-sm-12 div sitting inside main row so that all contents inside stacked when screen change-->
<div class="row"><!--col-xs-12 > row inside responsive column-xs-12, -->
    <div class="col-sm-12"><!--col-sm-12 This is for main header -->
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-check'></i>
                <span>Check In</span>

            </h1>


            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href='checkin.html'>
                            <i class='icon-check'>
                            </i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Header -->
    </div>
    <!-- Wrapper col-sm-12 for header div -->
</div>
<div class="row">
<div class="col-sm-12">
<div class='row'>
<div class='col-sm-12'>
<div class='box bordered-box orange-border' style='margin-bottom:0;'>
<div class='box-header contrast-background'>
</div>
<div class='box-content box-no-padding'>
<div class='responsive-table'>
<div class='scrollable-area'>
<table class='table table-hover data-table-column-filter table table-bordered table-striped'
       style='margin-bottom:0;'
       id="tbViewJob">
<thead>
<!-- TODO: Add hidden Id column for database -->
<tr>
    <th>
        Name
    </th>
    <th>
        IC
    </th>
    <th>
        Job Scope
    </th>
    <th>
        Reporting Date
    </th>
    <th>
        Start Time
    </th>
    <th>
        End Time
    </th>
    <th>Contact</th>
    <th>
        Check-in
    </th>
</tr>
</thead>
<tbody>

<!--Todo: call processCheckIn->ShowCheckIn -->
</tbody>
<tfoot>
<tr>
    <th>Name</th>
    <th>IC</th>
    <th>Job Scope</th>
    <th>Reporting Date</th>
</tr>
</tfoot>
</table>
</div>
</div>
<!-- Box Content -->
</div>
</div>
</div>
</div>
<!-- row -->
</div>

</div>
<!--End Row containing the table, the body part -->

<!-- End col-xs-12 > row -->
</div>
<!--End Main Column-->
<!-- End container.row.col-xs-12-->
</div>
<!-- End container.row -->
<footer id='footer'>
    <div class='footer-wrapper'>
        <div class='row'>
            <div class='col-sm-6 text'>Copyright ? 2013 Dev Seahouse</div>
            <div class='col-sm-6 buttons'>
                <a class="btn btn-link" href="">Preview</a>
                <a class="btn btn-link"
                   href="https://github.com/dev-seahouse">FYP Project</a>
            </div>
        </div>
    </div>
</footer>
<!--Footer -->
</div>
<!-- Container -->
</section>
</div>
<!-- Wrapper -->
<!-- / jquery [required] -->
<script src="assets/javascripts/jquery/jquery-2.0.3.min.js" type="text/javascript"></script>
<!-- / jquery mobile (for touch events) -->
<script src="assets/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
<!-- / jquery migrate (for compatibility with new jquery) [required] -->
<script src="assets/javascripts/jquery/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- / jquery ui -->
<script src="assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
<!-- / jQuery UI Touch Punch -->
<script src="assets/javascripts/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js"
        type="text/javascript"></script>
<!-- / bootstrap [required] -->
<script src="assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>
<!-- / modernizr -->
<script src="assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
<!-- / retina -->
<script src="assets/javascripts/plugins/retina/retina.js" type="text/javascript"></script>
<!-- / theme file [required] -->
<script src="assets/javascripts/theme.js" type="text/javascript"></script>
<!-- / demo file [not required!] -->
<script src="assets/javascripts/demo.js" type="text/javascript"></script>
<!-- / START - page related files and scripts [optional] -->
<script src="assets/javascripts/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/datatables/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/datatables/dataTables.overrides.js" type="text/javascript"></script>
<script type="text/javascript">
    $('input[type=checkbox]').click(function () {
                this.disabled = true;
            }
    );
</script>
<!-- / END - page related files and scripts [optional] -->
<script type="text/javascript">
function updateCheckIn(app_id) {
$.ajax({
	type       : "POST",
	url        : "processCheckIn.php",
	crossDomain: true,
	data       : {
        app_id : app_id,
        check_in:1
        //pass in job id here.
    },
	dataType   : 'text',
	timeout	   : 5000,
    success: function(response) {
       alert(response);
    }
});	
}

function GetQueryStringParams(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return sParameterName[1];
        }
    }
}
</script>
</body>
</html>