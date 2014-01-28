<?php
include_once("classes/Postjob.php");
require_once("config/db.php");
$postjob=new Postjob();
?>
<!DOCTYPE html>
<html>
<head>
    <title>IMF Management Application - POST Job</title>
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
    <link rel="stylesheet" type="text/css" href="jquery-addresspicker-master/demos/demo.css">
    <!--[if lt IE 9]>
    <script src="assets/javascripts/compatibility/html5shiv.js" type="text/javascript"></script>
    <script src="assets/javascripts/compatibility/response.min.js" type="text/javascript"></script>
    <![endif]-->

</head>
<body class='contrast-blue without-footer fixed-navigation fixed-header'>
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
                            Steven Sim applied waitor position
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
                            Mhamd Nazrin has cancelled her waitor position.
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
            <span class='user-name'><?=$_SESSION["company_name"]?></span> <b class='caret'></b>
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
</ul>
<!-- ====================== End of Top Right Profile menu Dropdown ===================== -->
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
                <a href="#">
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
                <a href="viewjob.html">
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
                <a class="dropdown-collapse" href="#">
                    <i class='icon-check'></i>
                    <span>Mark Attendance</span>
                    <i class='icon-angle-down angle-down'></i>
                </a>

                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='checkin.html'>
                            <i class='icon-caret-right'></i>
                            <span>Check in</span>
                        </a>
                    </li>
                    <li class=''>
                        <a href='checkout.html'>
                            <i class='icon-caret-right'></i>
                            <span>Checkout</span>
                        </a>
                    </li>
                </ul>
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
<!-- =================    Header starts Here ============= -->
<div class="row">
    <div class='col-sm-12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-edit'></i>
                <span>Post New Job</span>
            </h1>

            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href='#'>
                            <i class='icon-suitcase'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Post New Job</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- ==============    Header ends Here ============= -->
<!-- ==============    Wizard starts here =========== -->
<div class='row'>
<div class='col-sm-12'>
<div class='box'>
<div class='box-content box-padding'>
<div class='fuelux'>
<!--  ===========        Wizard header starts here ========== -->
<div class='wizard' id="MyWizard">
    <ul class='steps'>
        <li class='active' data-target='#step1'>
            <span class='step'>1</span>
        </li>
        <li data-target='#step2'>
            <span class='step'>2</span>
        </li>
        <li data-target='#step3'>
            <span class='step'>3</span>
        </li>
        <li data-target='#step4'>
            <span class='step'>4</span>
        </li>
    </ul>
    <div class='actions'>
        <button class='btn btn-xs btn-prev resetMap'>
            <i class='icon-arrow-left'></i>
            Prev
        </button>
        <button class='btn btn-xs btn-success btn-next resetMap' data-last='Finish'>
            Next
            <i class='icon-arrow-right'></i>
        </button>
    </div>
</div>
<!-- ============      Wizards header ends here =============================-->
<!--FIXME:header number layout break on xs device-->
<div class='step-content'>
<hr class='hr-normal'>
<form class="form" style="margin-bottom: 0;" method="post" action="viewjob.html" accept-charset="UTF-8">
<!-- For rails <input name="authenticity_token" type="hidden" />
-->
<!-- ==========       Step one - Enter job title starts here =============== -->
<div class='step-pane active' id='step1'>
    <div class='row'>
        <div class='col-sm-10'>
            <div class='box bordered-box no-mg-b'>
                <div class='box-content box-double-padding-sm'>
                    <fieldset>
                        <div class='col-sm-4'>
                            <div class='box'>
                                <div class='lead'>
                                    <i class='icon-file text-contrast'></i>
                                    Job Definition
                                </div>
                                <small class='text-muted'>What is this job about?</small>
                            </div>
                        </div>
                        <div class='col-sm-7 col-sm-offset-1'>
                            <div class='form-group'>
                                <label>Job Category</label>
                                <!-- TODO:use select2 native ajax to get data-->
                                <select class='select2 form-control' id="selJobCategory" name="selJobCategory">
                                    <?php $postjob->getJobCategory();?>
                                </select>
                                <p class='help-block'>
                                    <small class='text-muted'>
                                        Please choose a job category best describes the
                                        position required
                                    </small>
                                </p>
                            </div>
                            <div class='form-group'>
                                <!-- TODO:echo scope-->
                                <label>Job Scope</label>
                                <input class='form-control' id='inputJobScope'
                                       name="txtJobScope" maxlength="300"
                                       placeholder='ScopeID' type='text' disabled></div>
                            <div class='form-group'>
                                <label>
                                    Additional Description
                                    <span class="small text-muted">&nbsp(Optional)</span>
                                </label>
                                <textarea class='char-counter autosize form-control'
                                          rows='2' maxlength='300' data-char-allowed='300'
                                          data-char-warning='250'
                                          style='margin-bottom: 0;'></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <hr class='hr-normal'>
                    <fieldset>
                        <div class='col-sm-4 '>
                            <div class='box'>
                                <div class='lead'>
                                    <i class='icon-filter contrast'></i>
                                    &nbspJob Requirements
                                </div>
                                <small class='text-muted'>
                                    Is there any special requirements
                                    for job seekers?
                                </small>
                            </div>
                        </div>
                        <div class='col-sm-7 col-sm-offset-1'>
                            <div class='form-group'>
                                <label>
                                    Job Requirements
                                    <span class="small text-muted">&nbsp(Optional)</span>
                                </label>
                                <textarea class='char-counter autosize form-control'
                                          rows='2' maxlength='300' data-char-allowed='300'
                                          data-char-warning='250'
                                          style='margin-bottom: 0;' id="txtJobRequirement"
                                          name="txtJobRequirement"></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <hr class="hr-normal">
                    <fieldset>
                        <div class='col-sm-4 '>
                            <div class='box'>
                                <div class='lead'>
                                    <i class='icon-dollar contrast'></i>
                                    &nbspPay
                                </div>
                                <small class='text-muted'>
                                    Please specify standard and bonus pay rate:
                                </small>
                            </div>
                        </div>
                        <div class='col-sm-7 col-sm-offset-1'>
                            <div class='form-group'>
                                <label for="txtStandardPay">Standard Pay</label>
                                <div class='row'>
                                    <div class='col-sm-7'>
                                        <div class='input-group'>
                                    <span class='input-group-addon'>
                                      S$
                                    </span>
                                            <input class='form-control input-lg text-right' type='number' min="0"
                                                   id="txtStandardPay">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for="txtBonusPay">Bonus Pay</label>

                                <div class='row'>
                                    <div class='col-sm-7'>
                                        <div class='input-group'>
                                    <span class='input-group-addon'>
                                      S$
                                    </span>
                                            <input class='form-control input-lg text-right' type='number' min="0"
                                                   id="txtBonusPay">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </fieldset>
                    <hr class="hr-normal"/>
                    <fieldset>
                        <div class="col-sm-4">
                            <div class="box">
                                <div class="lead">
                                    <i class="icon-question contrast"></i>
                                    &nbspJob Vacancy
                                </div>
                                <small class='text-muted'>How many people are needed?</small>
                            </div>
                        </div>
                        <div class='col-sm-7 col-sm-offset-1'>
                            <div class='form-group'>
                                <label>Vacancy</label>
                                <input class="form-control" type="number" min="1" id="txtNumRequired"
                                       name="txtNumRequired"></div>
                        </div>

                    </fieldset>
                </div>
            </div>
            <!-- ======= Next Button field   ======= -->
            <div class='form-actions form-actions-padding text-right no-mg-t'>
                <div class='btn btn-primary btn-lg btnWizardNext'>
                    <i class='icon-arrow-right'></i>
                    Next
                </div>
            </div>
            <!-- ======End of Next Button Field ======== --> </div>
    </div>
</div>
<!-- ===========      Step two - Location and dates starts here ============= -->
<div class='step-pane' id='step2'>
    <div class="row">
        <div class="col-sm-10">
            <div class="box bordered-box no-mg-b">
                <div class="box-content box-double-padding-sm">
                    <fieldset>
                        <div class="col-sm-4">
                            <div class="box">
                                <div class='lead'>
                                    <i class='icon-location-arrow text-contrast'></i>
                                    Job Location
                                </div>
                                <small class='text-muted'>Where should job seekers report to?</small>
                            </div>
                        </div>
                        <div class='col-sm-7 col-sm-offset-1'>
                            <div class='form-group'>
                                <label>Type your Address here</label>
                                <input class="form-control" type="text" autocomplete='off'
                                       placeholder="Zip code/Street Address"
                                       id="txtAddress" name="txtAddress"></div>
                            <div class="form-group">
                                <div class="box box-bordered">
                                    <div class="box box-content">
                                        <div id="map"></div>
                                        <div id="legend">You can drag and drop the marker to the correct location</div>
                                    </div>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label>Instructions</label>
                                <span class="small text-muted">&nbsp(Optional)</span>
                                <textarea class='char-max-length autosize form-control'
                                          rows='2' maxlength='50' data-char-allowed='50'
                                          data-char-warning='30'
                                          style='margin-bottom: 0;' id="txtInstruction" name="txtInstruction"
                                          placeholder="eg.Report at front gate"></textarea>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <!-- ======= Next Button field   ======= -->
            <div class='form-actions form-actions-padding text-right no-mg-t'>
                <div class='btn btn-primary btn-lg btnWizardNext'>
                    <i class='icon-arrow-right'></i>
                    Next
                </div>
            </div>
            <!-- ======End of Next Button Field ======== --> </div>
    </div>
</div>
<!-- ===========      Step three - dates time starts  here ============= -->
<div class='step-pane' id='step3'>
    <div class="row">
        <div class="col-sm-10">
            <div class="box bordered-box no-mg-b">
                <div class="box-content box-double-padding-sm">
                    <fieldset>
                        <div class="col-sm-4">
                            <div class='box'>
                                <div class='lead'>
                                    <i class='icon-file text-contrast'></i>
                                    &nbspJob Date
                                </div>
                                <small class='text-muted'>Choose working days for the job</small>
                            </div>
                        </div>
                        <div class="col-sm-7 col-sm-offset-1">
                            <div class="box bordered-box blue-border ">
                                <div>
                                    <label>Select Date Range</label>

                                    <div class='input-group'>
                                        <input class='form-control daterange' placeholder='Select daterange'
                                               type='text'>
                                                                                    <span class='input-group-addon'
                                                                                          id='daterange2'>
                                                                                        <i class='icon-calendar'></i>
                                                                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <hr class='hr-normal'>
                    <fieldset>
                        <div class="col-sm-4">
                            <div class='box'>
                                <div class='lead'>
                                    <i class='icon-file text-contrast'></i>
                                    &nbsp Time
                                </div>
                                <small class='text-muted'>Choose working time for the job</small>
                            </div>
                        </div>
                        <div class="col-sm-7 col-sm-offset-1">
                            <div class="box bordered-box blue-border ">
                                <div class="form-actions">
                                    <label>Select start time</label>

                                    <div class='timepicker input-group' id='timepicker'>
                                        <input class='form-control' data-format='hh:mm'
                                               placeholder='Select timepicker' type='text'>
                          <span class='input-group-addon'>
                            <span data-date-icon='icon-calendar' data-time-icon='icon-time'></span>
                          </span>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <label>Select end time</label>

                                    <div class='timepicker input-group' id='timepicker'>
                                        <input class='form-control' data-format='hh:mm'
                                               placeholder='Select timepicker' type='text'>
                          <span class='input-group-addon'>
                            <span data-date-icon='icon-calendar' data-time-icon='icon-time'></span>
                          </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <!-- ======= Next Button field   ======= -->
            <div class='form-actions form-actions-padding text-right no-mg-t'>
                <div class='btn btn-primary btn-lg btnWizardNext'>
                    <i class='icon-arrow-right'></i>
                    Next
                </div>
            </div>
            <!-- ======End of Next Button Field ======== --> </div>
    </div>
</div>
<!-- ===========      Step three ends here ============= -->
<div class='step-pane' id='step4'>
    <!--TODO:Add javascript dynamically consolidate date on one page, use replace text address with location map,replace layout to tab layout.-->
    <div class="row">
        <div class="col-sm-12">
            <div class="box bordered-box no-mg-b">
                <div class="box-content box-double-padding-sm">
                    <fieldset>
                        <div class="col-sm-4">
                            <div class='box'>
                                <div class='lead'>
                                    <i class='icon-file text-contrast'></i>
                                    &nbsp Confirmation
                                </div>
                                <small class='text-muted'>Please Review before confirming posting.</small>
                            </div>
                        </div>
                        <div class="col-sm-7 col-sm-offset-1">
                            <div class="box bordered-box blue-border ">
                                <div class="form-group">
                                    <label>Job Title</label>

                                    <div class='input-group'>
                                        <div class="box-toolbox">
                                            Regent Hotel Waiter
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>

                                    <div class='input-group'>
                                        <div class="box-toolbox">
                                            Waiter
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Job Scope</label>

                                    <div class='input-group'>
                                        <div class="box-toolbox">
                                            Serving VIP
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Job Description</label>

                                    <div class='input-group'>
                                        <div class="box-toolbox">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab doloribus
                                                harum id iure laudantium neque voluptatibus. Asperiores autem beatae,
                                                cumque deleniti distinctio doloremque, harum illum odit quam recusandae
                                                veniam voluptatem?</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pay</label>

                                    <div class='input-group'>
                                        <div class="box-toolbox">
                                            Skilled Rate: S$5.50
                                        </div>
                                        <div class="box-toolbox">
                                            Non-Skilled Rate: S$7.50
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Number Needed</label>

                                    <div class='input-group'>
                                        <div class="box-toolbox">
                                            20
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Location</label>

                                    <div class='input-group'>
                                        <div class="box-toolbox">
                                            1 Cuscaden Road, Singapore 249715
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Start Date/End Date</label>

                                    <div class='input-group'>
                                        <div class="box-toolbox">
                                            1 Dec 2013 - 5 Dec 2013
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Available Time Slots</label>

                                    <div class='input-group'>
                                        <div class="box-toolbox">
                                            8:00 - 13:00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <!-- ======= Submit Button field   ======= -->
                <div class='form-actions form-actions-padding text-right no-mg-t'>
                    <button class='btn btn-primary btn-lg btnWizardNext'>
                        <i class='icon-arrow-right'></i>
                        Confirm
                    </button>
                </div>
                <!-- ======End of Submit Button Field ======== --> </div>

        </div>
    </div>
</div>
<!-- ===========      Step four ends here ============= --> </form>
</div>
<!-- ======= End of step content ======= --> </div>
</div>
</div>
</div>
</div>
<!-- End of Wizard --> </div>
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
</div>
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
<script src="assets/javascripts/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<!-- / modernizr -->
<script src="assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
<!-- / retina -->
<script src="assets/javascripts/plugins/retina/retina.js" type="text/javascript"></script>
<!-- / theme file [required] -->
<script src="assets/javascripts/theme.js" type="text/javascript"></script>
<!-- / demo file [not required!] -->
<script src="assets/javascripts/demo.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/bootstrap_maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/charCount/charCount.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/autosize/jquery.autosize-min.js" type="text/javascript"></script>
<!-- / START - page related files and scripts [optional] -->
<script src="assets/javascripts/plugins/fuelux/wizard.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/select2/select2.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/common/moment.min.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.js"
        type="text/javascript"></script>
<script src="assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js"
        type="text/javascript"></script>
<script src="assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js"
        type="text/javascript"></script>
<script src="assets/javascripts/plugins/typeahead/typeahead.js" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="assets/javascripts/plugins/addresspicker/jquery.ui.addresspicker.js" type="text/javascript"></script>

<!-- / END - page related files and scripts [optional] -->
<script>
    $('.btnWizardPrev').on('click', function () {
        $('#MyWizard').wizard('previous');
    });
    $('.btnWizardNext').on('click', function () {
        //alert($('#selJobCategory').text());
        setTimeout(function () {
            resetMap()
        }, 100);
        $('#MyWizard').wizard('next', 'foo');

    });
</script>
<script>
    $(function () {
        var addresspickerMap = $("#txtAddress").addresspicker({
            regionBias: "null",
            componentsFilter: 'country:SG',
            updateCallback: showCallback,
            elements: {
                map: "#map",
                lat: "#lat",
                lng: "#lng",
                street_number: '#street_number',
                route: '#route',
                locality: '#locality',
                administrative_area_level_2: '#administrative_area_level_2',
                administrative_area_level_1: '#administrative_area_level_1',
                country: '#country',
                postal_code: '#postal_code',
                type: '#type'
            }
        });

        var gmarker = addresspickerMap.addresspicker("marker");
        gmarker.setVisible(true);
        addresspickerMap.addresspicker("updatePosition");

        $('#reverseGeocode').change(function () {
            $("#addresspicker_map").addresspicker("option", "reverseGeocode", ($(this).val() === 'true'));
        });

        function showCallback(geocodeResult, parsedGeocodeResult) {
            $('#callback_result').text(JSON.stringify(parsedGeocodeResult, null, 4));
        }

    });

    $(".resetMap").click(function () {
        setTimeout(function () {
            resetMap()
        }, 50)
    });

    function resetMap() {
        google.maps.event.trigger(map, 'resize');
    }

    $("#daterange2").daterangepicker({
        format: "DD/MM/YYYY"
    }, function (start, end) {
        return $("#daterange2").parent().find("input").first().val(start.format("D MMMM, YYYY") + " - " + end.format("D MMMM, YYYY"));
    });

    $.fn.datetimepicker.defaults = {
        maskInput: true,           // disables the text input mask
        pickDate: false,            // disables the date picker
        pickTime: true,            // disables de time picker
        pick12HourFormat: false,   // enables the 12-hour format time picker
        pickSeconds: false,         // disables seconds in the time picker
        startDate: -Infinity,      // set a minimum date
        endDate: Infinity          // set a maximum date
    };

</script>
</body>
</html>