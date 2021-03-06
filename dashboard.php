
<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/controllers/processDashBoard.php");
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
    <script src="assets/javascripts/ie/html5shiv.js" type="text/javascript"></script>
    <script src="assets/javascripts/ie/respond.min.js" type="text/javascript"></script>
    <![endif]-->
</head>
<body class='contrast-blue without-footer fixed-header fixed-navigation '>
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
            <span class='user-name'><?= $_SESSION["company_name"] ?></span> <b class='caret'></b>
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
                <a href='controllers/processlogin.php?logout'>
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
            <!-- ====================  End of search button for mobile ======================== -->
            <!-- ====================  Left side navigation starts here ======================= -->
            <ul class='nav nav-stacked'>
                <li class=''>
                    <a href='dashboard.php'>
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
                    <a href="canceljob.php">
                        <i class='icon-remove'></i>
                        <span>Cancel Job</span>
                    </a>
                </li>
                <li class=''>
                    <a href="viewjob.php">
                        <i class='icon-suitcase'></i>
                        <span>View Posted Job</span>
                    </a>
                </li>
                <li class=''>
                    <a href="viewapplicants.php">
                        <i class='icon-user'></i>
                        <span>View Job Applications</span>
                    </a>
                </li>
                <li class=''>
                    <a class="dropdown-collapse" href="">
                        <i class='icon-check'></i>
                        <span>Mark Attendance</span>
                        <i class='icon-angle-down angle-down'></i>
                    </a>

                    <ul class='nav nav-stacked'>
                        <li class=''>
                            <a href='checkin.php'>
                                <i class='icon-caret-right'></i>
                                <span>Check in</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='checkout.php'>
                                <i class='icon-caret-right'></i>
                                <span>Checkout</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=''>
                    <a href="managePay.php">
                        <i class='icon-usd'></i>
                        <span>Manage Pay</span>
                    </a>
                </li>
                <li class=''>
                    <a  href="managecomment.php">
                        <i class='icon-star-half-empty'></i>
                        <span>Manage Feedback</span>

                    </a>

                </li>
                <li class=''>
                    <a href="contact.php">
                        <i class='icon-envelope'></i>
                        <span>Contact Support</span>
                    </a>
                </li>
                <li class=''>
                    <a href="controllers/processlogin.php?logout">
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
                <div class='col-xs-12'>
                    <div class='page-header page-header-with-buttons'>
                        <h1 class='pull-left'>
                            <i class='icon-dashboard'></i>
                            <span>Dashboard</span>
                        </h1>
                    </div>
                    <!-- Main content starts -->
                    <div class='row'>
                        <div class='col-sm-6 col-md-3'>
                            <div class='box'>
                                <div class='box-header'>
                                    <div class='title'>
                                        <i class='icon-file'></i>
                                        Jobs<small class="text-muted" style="font-size: 0.6em">(Past 30 days)</small>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12' id="job_data">

                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-muted'><?=$job_summary[0]?></h3>
                                            <small>Pending</small>
                                            <div class='text-muted icon-time align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-success'><?=$job_summary[1]?></h3>
                                            <small>Fulfilled</small>
                                            <div class='text-success icon-inbox align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-warning'><?=$job_summary[2]?></h3>
                                            <small>Closed</small>
                                            <div class='text-warning icon-lock align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-error'><?=$job_summary[3]?></h3>
                                            <small>Cancelled</small>
                                            <div class='text-error icon-remove align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-info'><?=$job_summary[4]?></h3>
                                            <small>Total Jobs Created</small>
                                            <div class='text-info icon-file align-right'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6 col-md-3'>
                            <div class='box'>
                                <div class='box-header'>
                                    <div class='title'>
                                        <i class='icon-user'></i>
                                        Applicants<small class="text-muted" style="font-size: 0.6em">(Past 30 days)</small>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-muted'><?=$applicant_summary[0]?></h3>
                                            <small>Applied</small>
                                            <div class='text-muted icon-time align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-success'><?=$applicant_summary[1]?></h3>
                                            <small>Completed</small>
                                            <div class='text-success icon-check align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-warning'><?=$applicant_summary[2]?></h3>
                                            <small>Absent</small>
                                            <div class='text-warning icon-frown align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-error'><?=$applicant_summary[3]?></h3>
                                            <small>Cancelled</small>
                                            <div class='text-error icon-remove align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-info'><?=$applicant_summary[4]?></h3>
                                            <small>Total Applicants</small>
                                            <div class='text-info icon-file align-right'></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6 col-md-3'>
                            <div class='box'>
                                <div class='box-header'>
                                    <div class='title'>
                                        <i class='icon-dollar'></i>
                                        Salary Cost<small class="text-muted" style="font-size: 0.6em"> (Sum)</small>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-muted'><?=$pay_summary[0]?></h3>
                                            <small>Weekly Total</small>
                                            <div class='text-muted icon-bar-chart align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-success'><?=$pay_summary[1]?></h3>
                                            <small>Monthly Total</small>
                                            <div class='text-success icon-bar-chart align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-warning'><?=$pay_summary[2]?></h3>
                                            <small>Quarter Total</small>
                                            <div class='text-warning icon-bar-chart align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-error'><?=$pay_summary[3]?></h3>
                                            <small>Annual Total</small>
                                            <div class='text-error icon-bar-chart align-right'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6 col-md-3'>
                            <div class='box'>
                                <div class='box-header'>
                                    <div class='title'>
                                        <i class='icon-dollar'></i>
                                        Salary Cost<small class="text-muted" style="font-size: 0.6em"> (Average)</small>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-muted'><?=$pay_avg[0]?></h3>
                                            <small>Weekly Average</small>
                                            <div class='text-muted icon-bar-chart align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-success'><?=$pay_avg[1]?></h3>
                                            <small>Monthly Average</small>
                                            <div class='text-success icon-bar-chart align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-warning'><?=$pay_avg[2]?></h3>
                                            <small>Quarter Average</small>
                                            <div class='text-warning icon-bar-chart align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-error'><?=$pay_avg[3]?></h3>
                                            <small>Annual Average</small>
                                            <div class='text-error icon-bar-chart align-right'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                    <!-- Main content here -->

                </div>
            </div>
            <footer id='footer'>
                <div class='footer-wrapper'>
                    <div class='row'>
                        <div class='col-sm-6 text'>Copyright © 2013 Your Project Name</div>
                        <div class='col-sm-6 buttons'>
                            <a class="btn btn-link" href="http://www.bublinastudio.com/flatty">Preview</a>
                            <a class="btn btn-link"
                               href="https://wrapbootstrap.com/theme/flatty-flat-administration-template-WB0P6NR1N">Purchase</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
</div>
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

<!-- / END - page related files and scripts [optional] -->
</body>
</html>