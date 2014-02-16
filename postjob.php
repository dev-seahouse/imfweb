<?php
include_once(dirname(__FILE__) . "/controllers/processPostJob.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>IMF Management Application - Post Job</title>
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
    <link rel="stylesheet" type="text/css"
          href="assets/stylesheets/plugins/jquerydatetimepicker/jquery.datetimepicker.css">

    <!--[if lt IE 9]>
    <script src="assets/javascripts/compatibility/html5shiv.js" type="text/javascript"></script>
    <script src="assets/javascripts/compatibility/response.min.js" type="text/javascript"></script>
    <![endif]--> </head>
<body class='contrast-blue without-footer fixed-navigation fixed-header'>
<header>
<nav class='navbar navbar-default navbar-fixed-top'>
<a class='navbar-brand' href='dashboard.php'>

    <!--<img width="81" height="21" class="logo" alt="Flatty" src="assets/images/logo.svg" />
    <img width="21" height="21" class="logo-xs" alt="Flatty" src="assets/images/logo_xs.svg" />
  -->
</a>
<a class='toggle-nav btn pull-left' href='#'><i class='icon-reorder'></i>
</a>
<!-- ====================     Nav Class      =================== -->
<ul class='nav'>
    <!-- ==================== Theme Color Changer ================== -->
    <li class='dropdown light only-icon'>
        <a class='dropdown-toggle' data-toggle='dropdown' href='#'><i class='icon-cog'></i>
        </a>
        <ul class='dropdown-menu color-settings'>
            <li class='color-settings-contrast-color'>
                <div class='color-title'>Select Theme</div>
                <a data-change-to="contrast-red" href="#"> <i class='icon-cog text-red'></i>
                    Red
                    <small>(default)</small>
                </a>

                <a data-change-to="contrast-blue" href="#"> <i class='icon-cog text-blue'></i>
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
                <a href='dashboard.php'>
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
                <a class="dropdown-collapse" href="#">
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
                <a class="dropdown-collapse" href="managecomment.php">
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
    </ul>
    <div class='actions col-sm-4 col-md-4 col-lg-3'>
        <button class='btn btn-sm btn-prev'>
            <i class='glyphicon glyphicon-arrow-left'></i>
            Prev
        </button>
        <button class='btn btn-sm contrast btn-next' data-last='Finish'>
            Next
            <i class='glyphicon glyphicon-arrow-right'></i>
        </button>
    </div>
</div>
<!-- ============      Wizards header ends here =============================-->
<!--FIXME:header number layout break on xs device-->
<div class='step-content'>
<hr class='hr-normal'>
<form class="form form-horizontal validate-form" style="margin-bottom: 0;" method="post"
      action="controllers/processPostJob.php"
      accept-charset="UTF-8" id="frmPostJob" name="frmPostJob">
<!-- For rails <input name="authenticity_token" type="hidden" />
-->
<!-- ==========       Step one - Enter job title starts here =============== -->
<div class='step-pane active' id='step1'>
    <div class='row'>
        <div class='col-sm-11'>
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
                                <label class="control-label" for="selJobCategory">Job Category</label>
                                <!-- TODO:use select2 native ajax to get data-->
                                <select class='select2 form-control' id="selJobCategory" name="selJobCategory"
                                        onchange="get_scopes(this.value)" data-rule-required='true'>
                                    <?= populate_jobcategory(); ?></select>

                                <p class='help-block'>
                                    <small class='text-muted'>
                                        Please choose a job category best describes the
                                        position required
                                    </small>
                                </p>
                            </div>
                            <!--                            <div class='form-group'>
                                                            <label class='control-label col-sm-3' for='validation_email'>E-mail</label>
                                                            <div class='col-sm-4 controls'>
                                                                <input class='form-control' data-rule-email='true' data-rule-required='true' id='validation_email' name='validation_email' placeholder='E-mail' type='text'>
                                                            </div>
                                                        </div>-->
                            <div class='form-group'>
                                <!-- TODO:echo scope-->
                                <label>Job Scope</label>
                                <!-- TODO: on scope change set text -->
                                <select class='select2 form-control' id="selJobScope" name="selJobScope"></select>
                            </div>
                            <div class='form-group no-mg-b'>
                                <label>Description</label>
                                <div class='box box-no-padding box-transparent no-mg-b text-muted'>
                                    <div class='scrollable' data-scrollable-height='110' data-scrollable-start='top' id="txtScopeDesciption" style="margin-bottom: -20;padding-bottom: 0">

                                        </div>
                                    </div>
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
                                <label class="control-label" for="">
                                    Job Requirements
                                    <span class="small text-muted">&nbsp(Optional)</span>
                                </label>

                                <div class="controls">
                                    <textarea class='char-counter autosize form-control'
                                              rows='2' maxlength='300' data-char-allowed='300'
                                              data-char-warning='250'
                                              style='margin-bottom: 0;' id="txtJobRequirement"
                                              name="txtJobRequirement" placeholder="eg.minimum age"></textarea>
                                </div>
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
                                <small class='text-muted'>Please specify pay rates.</small>
                            </div>
                        </div>
                        <div class='col-sm-7 col-sm-offset-1'>
                            <div class='form-group controls'>
                                <label for="txtStandardPay" class="control-label">Standard Pay Rate</label>
                                <span class="small text-muted">&nbsp(Per Hour)</span>

                                <div class='row'>
                                    <div class='col-sm-7'>
                                        <div class='input-group'>
                                            <span class='input-group-addon'>S$</span>

                                            <input class='form-control input-lg text-right' type='text' min="1"
                                                   id="txtStandardPay" data-rule-required='true'
                                                   data-rule-number="true">
                                            <span class='input-group-addon'>/Hour</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='form-group controls'>
                                <label for="txtBonusPay">Premium Pay Rate</label>
                                <span class="small text-muted">&nbsp(Optional) </span>

                                <a class="icon-question contrast has-popover"
                                   data-content='Employees can be given a special bonus pay rate based on total hours experience recorded in IMF database.'></a>
                                <input data-target='.set_premium' data-toggle='collapse'
                                       id='#' type='checkbox'
                                       value='option1'>
                                <div class='row collapse set_premium' id="">
                                    <div class='col-sm-7'>
                                        <div class='input-group'>
                                            <span class='input-group-addon'>S$</span>
                                            <input class='form-control input-lg text-right' type='text' min="0"
                                                   id="txtBonusPay" data-rule-number="true">
                                            <span class='input-group-addon'>/Hour</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class='form-group controls set_premium collapse'>
                                <label for="txtMinExpHours">Eligibility</label>

                                <a class="icon-question contrast has-popover"
                                   data-content='Specify the minimum hours of working experience required to be eligible for premium pay rate'></a>

                                <div class='row'>
                                    <div class='col-sm-7'>
                                        <div class='input-group'>

                                            <input class='form-control input-lg text-right' data-rule-number="true"
                                                   type='text' min="0"
                                                   id="txtMinExpHours">
                                            <span class='input-group-addon'>Hours</span>
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
                                <small class='text-muted'>Numnber of job vacancies</small>
                            </div>
                        </div>
                        <div class='col-sm-4 col-sm-offset-1'>
                            <div class='form-group controls'>
                                <label class="control-label" for="txtNumRequired">Vacancy</label>

                                <input class="form-control" type="text" min="1" id="txtNumRequired"
                                       name="txtNumRequired" data-rule-required='true'></div>
                        </div>

                    </fieldset>
                </div>
            </div>
            <!-- ======= Next Button field   ======= -->
            <div class='form-actions form-actions-padding text-right no-mg-t'>
                <div class='btn contrast btn-lg btnWizardNext'>
                    <i class='icon-arrow-right'></i>
                    Next
                </div>
            </div>
            <!-- ======End of Next Button Field ======== --> </div>
    </div>
</div>
<div class='step-pane' id='step2'>
    <div class="row">
        <div class="col-sm-11">
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
                                <div class="form-group controls">
                                    <label class="control-label" for="txtJobDate">Select Date</label>

                                    <div class='input-group'>
                                        <input class='form-control datetimepicker1'
                                               placeholder='Select datepicker' type='text' id="txtJobDate"
                                               name="txtJobDate" data-rule-required='true'>
                      <span class='input-group-addon'>
                        <span class="icon-calendar" id="datetime-trigger1"></span>
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
                            <div class="form-group controls">
                                <label class="control-label" for="txtStartTime">Select start time</label>

                                <div class='input-group'>
                                    <input class='form-control datetimepicker2' data-format='hh:mm'
                                           placeholder='Select timepicker' type='text' id="txtStartTime"
                                           name="txtStartTime" data-rule-required='true'>
                      <span class='input-group-addon'>
                        <span class="icon-time" id="datetime-trigger2"></span>
                      </span>
                                </div>
                            </div>
                            <div class="form-group controls">
                                <label class="control-label" for="txtEndtime">Select end time</label>

                                <div class='input-group'>
                                    <input class='form-control datetimepicker2' data-format='hh:mm'
                                           placeholder='Select timepicker' type='text' id='txtEndTime' name="txtEndTime"
                                           data-rule-required='true'>
                      <span class='input-group-addon'>
                        <span class="icon-time" id="datetime-trigger3"></span>
                      </span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <!-- ======= Next Button field   ======= -->
            <div class='form-actions form-actions-padding text-right no-mg-t'>
                <div class='btn contrast btn-lg btnWizardPrev'>
                    <i class='icon-arrow-left'></i>
                    Prev
                </div>
                <div class='btn contrast btn-lg btnWizardNext'>
                    <i class='icon-arrow-right'></i>
                    Next
                </div>

            </div>
            <!-- ======End of Next Button Field ======== --> </div>
    </div>
</div>
<!-- ===========      Step three ends here ============= -->
<div class='step-pane' id='step3'>
<!--TODO:Add javascript dynamically consolidate date on one page, use replace text address with location map,replace layout to tab layout.-->
<div class="row">
<div class="col-sm-11">
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
<div class="row">
    <div class='box box-nomargin box-no-padding'>
        <div class='box-header box-header-small'>
            <div class='title'>
                <i class='icon-book'></i>
                Job Category
            </div>
            <div class='actions'>
                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content' id="confirmJobCat">
            Explicabo voluptate eos ipsam et recusandae quasi laudantium est velit nihil
            perspiciatis minima corrupti neque sint dolores dolorum consequatur voluptatem
        </div>
    </div>
</div>
<div class="row">
    <div class='box box-nomargin box-no-padding'>
        <div class='box-header box-header-small'>
            <div class='title'>
                <i class='icon-search'></i>
                Job Scope
            </div>
            <div class='actions'>
                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content' id="confirmJobScope">

        </div>
    </div>
</div>
<div class="row">
    <div class='box box-nomargin box-no-padding box-collapsed'>
        <div class='box-header box-header-small'>
            <div class='title'>
                <i class='icon-folder-close-alt'></i>
                Job Description
                <small class='text-muted'>
                    (click arrow to expand)
                </small>
            </div>
            <div class='actions'>
                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content' id="confirmJobDesc">

        </div>
    </div>
</div>
<div class="row">
    <div class='box box-nomargin box-no-padding box-collapsed'>
        <div class='box-header box-header-small'>
            <div class='title'>
                <i class='icon-question'></i>
                Job Requirements
                <small class='text-muted'>
                    (click arrow to expand)
                </small>
            </div>
            <div class='actions'>
                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content' id="confirmJobRequirement">
            Empty
        </div>
    </div>
</div>
<div class="row">
    <div class='box box-nomargin box-no-padding'>
        <div class='box-header box-header-small'>
            <div class='title'>
                <i class='icon-dollar'></i>
                Pay
            </div>
            <div class='actions'>
                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content box-padding'>
            Standard Rate : $<span class="text-red" id="confirmStandardPay"></span> /Hour
        </div>
        <div class="box-content box-padding" id="confirmBonusPayBox">
            Premium Rate : $<span class="text-red" id="confirmBonusPay">Not Set</span> /Hour
        </div>
        <div class="box-content box-padding" id="confirmMinExpHoursBox">
            Premium Rate Eligibility : <span id="confirmMinExpHours">Not Set</span> Hours
        </div>
    </div>
</div>
<div class="row">
    <div class='box box-nomargin box-no-padding'>
        <div class='box-header box-header-small'>
            <div class='title'>
                <i class='icon-book'></i>
                Job Vacancy
            </div>
            <div class='actions'>
                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content' id="confirmVacancy">

        </div>
    </div>
</div>
<div class="row">
    <div class='box box-nomargin box-no-padding'>
        <div class='box-header box-header-small'>
            <div class='title'>
                <i class='icon-calendar'></i>
                Job Date
            </div>
            <div class='actions'>
                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content' id="confirmJobDate">

        </div>
    </div>
</div>
<div class="row">
    <div class='box box-nomargin box-no-padding'>
        <div class='box-header box-header-small'>
            <div class='title'>
                <i class='icon-time'></i>
                Job Start time
            </div>
            <div class='actions'>
                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content' id="confirmJobStartTime">

        </div>
    </div>
</div>
<div class="row">
    <div class='box box-nomargin box-no-padding'>
        <div class='box-header box-header-small'>
            <div class='title'>
                <i class='icon-time'></i>
                Job End Time
            </div>
            <div class='actions'>
                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content' id="confirmJobEndTime">

        </div>
    </div>
</div>


<!--
    <div class="box bordered-box blue-border ">
        <div class="form-group">
            <label>Job Title</label>

            <div class='input-group'>
                <div class="box-toolbox">Regent Hotel Waiter</div>
            </div>
        </div>
        <div class="form-group">
            <label>Category</label>

            <div class='input-group'>
                <div class="box-toolbox">Waiter</div>
            </div>
        </div>
        <div class="form-group">
            <label>Job Scope</label>

            <div class='input-group'>
                <div class="box-toolbox">Serving VIP</div>
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
                        veniam voluptatem?
                    </p>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Pay</label>

            <div class='input-group'>
                <div class="box-toolbox">Skilled Rate: S$5.50</div>
                <div class="box-toolbox">Non-Skilled Rate: S$7.50</div>
            </div>
        </div>
        <div class="form-group">
            <label>Number Needed</label>

            <div class='input-group'>
                <div class="box-toolbox">20</div>
            </div>
        </div>
        <div class="form-group">
            <label>Location</label>

            <div class='input-group'>
                <div class="box-toolbox">1 Cuscaden Road, Singapore 249715</div>
            </div>
        </div>
        <div class="form-group">
            <label>Start Date/End Date</label>

            <div class='input-group'>
                <div class="box-toolbox">1 Dec 2013 - 5 Dec 2013</div>
            </div>
        </div>
        <div class="form-group">
            <label>Available Time Slots</label>

            <div class='input-group'>
                <div class="box-toolbox">8:00 - 13:00</div>
            </div>
        </div>
    </div>
  --></div>
</fieldset>
</div>
<!-- ======= Submit Button field   ======= -->
<div class='form-actions form-actions-padding text-right no-mg-t'>
    <button class='btn contrast btn-lg' type="submit" value="submit" name="submitJob" id="submitJob">
        <i class='icon-arrow-right'></i>
        Confirm
    </button>
</div>
<!-- ======End of Submit Button Field ======== --> </div>

</div>
</div>
</div>
<!-- ===========      Step four ends here ============= -->
</form>
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
<script src="assets/javascripts/bootstrap/bootstrap.min.js"></script>
<script src="assets/javascripts/plugins/bootbox/bootbox.min.js"></script>
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
<script src="assets/javascripts/plugins/slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- / START - page related files and scripts [optional] -->
<script src="assets/javascripts/plugins/fuelux/wizard.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/select2/select2.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/common/moment.min.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.js"
        type="text/javascript"></script>
<!--<script src="assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js"
        type="text/javascript"></script>-->
<script type="text/javascript" src="assets/javascripts/plugins/jquerydatetimepicker/jquery.datetimepicker.js"></script>
<script src="assets/javascripts/plugins/typeahead/typeahead.js" type="text/javascript"></script>
<!-- Validation -->
<script src="assets/javascripts/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/validate/additional-methods.js" type="text/javascript"></script>


<!-- <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="assets/javascripts/plugins/addresspicker/jquery.ui.addresspicker.js" type="text/javascript"></script> -->

<!-- / END - page related files and scripts [optional] -->
<script>
$(document).ready(function () {
        //declare global vars
        var jobCategoryName,
            jobCategoryID,
            jobScopeName,
            jobScopeID,
            jobDescription,
            jobRequirement,
            standardPay,
            bonusPay,
            minExpHours,
            vacancy,
            jobDate,
            jobStartTime,
            jobEndTime;

        //set datetimepicker
        $(".datetimepicker1").datetimepicker({
            format: 'd-M-Y',
            timepicker: false
        });

        $("#txtStartTime").datetimepicker({
            //format: 'Y-M-d H:i',
            format: 'd-M-Y H:i',
            step: 5,
            onShow: function (current_time) {

                var d = new Date($('#txtJobDate').val());
                month = ("0" + (d.getMonth() + 1)).slice(-2);
                var toDay = d.getFullYear() + "/" + month + "/" + (d.getDate());


                var nextDay = d.getFullYear() + "/" + month + "/" + (d.getDate());
                //TODO: For some reason "-"  does not work. Something to take note in future when dealing with date

                this.setOptions({

                    minDate: $('#txtJobDate').val() ? toDay : false,
                    maxDate: $('#txtJobDate').val() ? nextDay : false
                });
            }
        });
        $("#txtEndTime").datetimepicker({
            format: 'd-M-Y H:i',
            step: 5,
            onShow: function (current_time) {

                var d = new Date($('#txtJobDate').val());
                month = ("0" + (d.getMonth() + 1)).slice(-2);
                var toDay = d.getFullYear() + "/" + month + "/" + (d.getDate());


                var nextDay = d.getFullYear() + "/" + month + "/" + (d.getDate() + 1);
                //TODO: For some reason "-"  does not work. Something to take note in future when dealing with date


                this.setOptions({
                    minDate: $('#txtJobDate').val() ? toDay : false,
                    maxDate: $('#txtJobDate').val() ? nextDay : false

                });
            }
        });

        $('#datetime-trigger1').click(function () {
            $('#txtJobDate').datetimepicker('show'); //support hide,show and destroy command
        });
        $('#datetime-trigger2').click(function () {
            $('#txtStartTime').datetimepicker('show'); //support hide,show and destroy command
        });
        $('#datetime-trigger3').click(function () {
            $('#txtEndTime').datetimepicker('show'); //support hide,show and destroy command
        });

        //initiate getJobCategories
        get_scopes($("#selJobCategory").val());

        //initiate flux ux wizard
        $('#MyWizard').on('change', function (e, data) {
            //console.log('change');
            //TODO:Enable this ltimepicker:false,ater.
            if ($(".validate-form").valid() == false) {
                e.preventDefault();
            }
            if (data.step === 2 && data.direction === 'next') {
                jobCategoryName = $("#selJobCategory option:selected").text();
                jobCategoryID = $("#selJobCategory").val();
                jobScopeName = $("#selJobScope option:selected").text();
                jobScopeID = $("#selJobScope").val();
                jobDescription = $("#txtScopeDesciption").val();
                jobRequirement = $("#txtJobRequirement").val();
                standardPay = Number($("#txtStandardPay").val()).toFixed(2);
                bonusPay = Number($("#txtBonusPay").val()).toFixed(2);
                minExpHours = $('#txtMinExpHours').val();
                vacancy = $('#txtNumRequired').val();
                jobDate = $('#txtJobDate').val();
                jobStartTime = $('#txtStartTime').val();
                jobEndTime = $('#txtEndTime').val();
                $('#confirmJobCat').html(jobCategoryName);
                $('#confirmJobScope').html(jobScopeName);
                $('#confirmJobDesc').html(jobDescription);
                if (jobRequirement != "") {
                    $('#confirmJobRequirement').html(jobRequirement);
                }
                $('#confirmStandardPay').html(standardPay);
                if (bonusPay >= 1) {
                    $('#confirmBonusPay').html(bonusPay);
                    $('#confirmMinExpHours').html(minExpHours);
                }
                else {
                    $('#confirmBonusPayBox').html("Bonus Rate : Not Set");
                    $('#confirmMinExpHoursBox').hide();
                }

                $('#confirmVacancy').html(vacancy);
                $('#confirmJobDate').html(jobDate);
                $('#confirmJobStartTime').html(jobStartTime);
                $('#confirmJobEndTime').html(jobEndTime);

            }
        });
        /*==========  Form submition handler  ==========*/
        $('#frmPostJob').submit(function (event) {
            event.preventDefault();
            var $form = $(this),
                url = $form.attr('action');

            $.ajax({
                type: "post",
                url: url,
                crossDomain: true,
                dataType: 'text',
                data: {
                    job_cat_id: jobCategoryID,
                    job_scope_id: jobScopeID,
                    standard_pay: standardPay,
                    bonus_pay: bonusPay,
                    min_exp_hours: minExpHours,
                    vacancy: vacancy,
                    job_date: jobDate,
                    job_start_time: jobStartTime,
                    job_end_time: jobEndTime,
                    post_new_job: 1,
                    job_requirement: jobRequirement
                },
                success: function (response) {


                    if ($.trim(response) == 'success') {

                        bootbox.alert("New " + jobCategoryName + " job have been created!", function () {
                            window.location = "viewjob.php";
                            //TODO:redirect to view jobs page.
                        });
                    }
                    //alert("success ajax call:" + response);
                    // handle response message
                },
                error: function (response) {
                    //alert("call failed" + response);
                }

            })


        });
    }
);

function get_scopes(categoryID) {
    // this is done to refresh data, otherwise value will not change
    $("#selJobScope").select2("destroy");
    //$("#selJobScope").select2();
    $.ajax({
        type: "POST",
        url: 'controllers/processPostJob.php',
        crossDomain: true,
        dataType: 'json',
        beforeSend: function () {
            $("#selJobScope").html("<option>Loading ...</option>");
        },
        data: {
            getScopes: 1,
            categoryID: categoryID
        },
        success: function (msg) {
            var html_out = "",
                selected_scope_id = "";
            for (var k in msg) {
                html_out += "<option value='" + msg[k].ScopeID + "'>" + msg[k].ScopeName + "</option>\n";
            }
            $("#selJobScope").html(html_out);
            //recreate select 2 after destroy
            $("#selJobScope").select2();
            selected_scope_id = $("#selJobScope").val();
            $("#selJobScope").change(function () {
                selected_scope_id = $("#selJobScope").val();
                for (var k in msg) {
                    if (msg[k].ScopeID == selected_scope_id) {
                        var a=msg[k].ScopeDesc;
                        var decoded = $('<div/>').html(a).text();
                        var splited=decoded.split("</p>");
                        var oneparagraph=splited[0];
                        var result=oneparagraph.replace("<p>"," ");
                        var result=result.trim();
                       $("#txtScopeDesciption").text(result);
                    }
                }
                ;
            })
            for (var k in msg) {
                if (msg[k].ScopeID == selected_scope_id) {
                    var a=msg[k].ScopeDesc;
                    var decoded = $('<div/>').html(a).text();
                    var splited=decoded.split("</p>");
                    var oneparagraph=splited[0];
                    var result=oneparagraph.replace("<p>"," ");
                    var result=result.trim();
                    $("#txtScopeDesciption").text(result);
                }
            }
            ;
        },
        error: function () {
            alert("error");
        }
    });
}

function confirmResult() {

}

</script>
<script>
    $('.btnWizardPrev').on('click', function () {
        $('#MyWizard').wizard('previous');
    });
    $('.btnWizardNext').on('click', function () {
        //alert($('#selJobCategory').text());
        // setTimeout(function () {
        //     resetMap()
        // }, 100);
        $('#MyWizard').wizard('next', 'foo');

    });
</script>
<script>
    /*    $(function () {
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
     */
    // $("#daterange2").daterangepicker({
    //   format: "DD/MM/YYYY"
    // }, function (start, end) {
    //   return $("#daterange2").parent().find("input").first().val(start.format("D MMMM, YYYY") + " - " + end.format("D MMMM, YYYY"));
    // });

</script>
</body>
</html>