<?php
//redirect to user_profile if user already logged in.
require_once("libraries/utilities.php");
session_start();
if (isset($_SESSION['user_login_status']) AND $_SESSION["user_login_status"] == 1) {
    redirect_to("dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="generator"
          content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>
        Document
    </title>
    <link rel="stylesheet" href="assets/stylesheets/bootstrap/bootstrap.min.css">
    <!-- <link  rel="stylesheet" href="css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="assets/stylesheets/flat-ui/flat-ui.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/plugins/supersized/supersized.css">
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/main.css">

    <!--         <link rel="stylesheet" type="text/css" href="assets/stylesheets/main.css"> -->

    <!--[if lt IE 9]>
    <script type="text/javascript" src="assets/javascripts/compatibility/html5shiv-printshiv.js"></script>
    <script type="text/javascript" src="assets/javascripts/compatibility/response.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- ==================== Login Page =========================== -->
<div class="row" id="status_banner">
    <div class="alert alert-info" style="text-align:center;" id="status_message">

    </div>
</div>
<div class="container" id="loginpg">
    <div class="row">
        <div class="col-md-5">
            <div class="header clearfix">
                <img src="assets/images/logo.png" alt="IMF logo" title="IMF logo" class="img-circle">

                <h1>
                    I'M Flexible
                </h1>
            </div>
            <form action="controllers/processlogin.php" method="post" role="form" id="frmLogin" name="frmLogin">
                <div class="form-group">
                    <label for="username" class="">Username</label> <input type="text" name="username" id="username"
                                                                           class="username form-control login-field"
                                                                           placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label> <input type="password" name="password"
                                                                  class="password form-control login-field"
                                                                  placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-lg" id="btnSignin" name="btnSignin">Sign me in</button>
                <span><a class="login-link" href="#" style="float:right;">Lost your password?</a></span>

                <div class="error">
                    <span>+</span>
                </div>
                <hr>
            </form>
            <div class="clearfix">

                <button id="btnShowSignUp" type="submit" class="btn btn-info col-xs-5 col-sm-5 col-md-8">Sign Up
                </button>
            </div>
        </div>
        <!-- ===================== Sign Up Form =========================== -->
        <div class="col-md-7" id="signUpField">
            <div class="header">
                <h1>
                    New to us? Sign up now!
                </h1>
            </div>
            <form action="controllers/processregister.php" class="form-horizontal" method="post" name="frmSignup"
                  id="frmSignup" role="form">

                <fieldset>
                    <legend>Basic information</legend>
                    <div class="form-group">
                        <label for="inputUserName" class="col-md-2 control-label">Username</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control input-sm" id="inputUserName" name="inputUserName"
                                   placeholder="Choose a username..." tabindex="10">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPasswd" class="col-md-2 control-label">Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control input-sm" id="inputPasswd" name="inputPasswd"
                                   placeholder="6-12 digits" tabindex="20">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputConfirmPasswd" class="col-md-2 control-label">Retype Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control input-sm" id="inputConfirmPasswd"
                                   name="inputConfirmPasswd" placeholder="Retype Password" tabindex="20">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-md-2 control-label">Email</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control input-sm" id="inputEmail" name="inputEmail"
                                   placeholder="Enter Valid Email Address" tabindex="30">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Organisational Information</legend>
                    <div class="form-group">
                        <label for="inputCompany" class="col-md-2 control-label">Company</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control input-sm" id="inputCompany" name="inputCompany"
                                   placeholder="Enter Company Name" tabindex="40">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress" class="col-md-2 control-label">Address</label>

                        <div class="col-md-6">
                            <input autofocus type="text" class="form-control input-sm" id="inputAddress"
                                   name="inputAddress" placeholder="Enter Company Address" tabindex="50">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputZipcode" class="col-md-2 control-label" >Zipcode</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control input-sm" id="inputZipcode" name="inputZipcode"
                                   placeholder="Enter Company Zip code" tabindex="60" autocomplete="off">
                            <input name="inputLat" id="inputLat" type="hidden"/>
                            <input name="inputLong" id="inputLong" type="hidden"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPhone" class="col-md-2 control-label">Phone</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control input-sm" id="inputPhone" name="inputPhone"
                                   placeholder="Enter Phone Number" tabindex="70">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardinal" class="col-md-2 control-label" >Region</label>

                        <div class="col-md-6">
                            <select class="form-control" name="cardinal" id="cardinal">
                                <option value="Central">Central</option>
                                <option value="East">East</option>
                                <option value="North">North</option>
                                <option value="North-East">North-East</option>
                                <option value="West">West</option>
                            </select>
                            <hr>
                            <button type="submit" class="col-md-8 btn btn-primary pull-right" tabindex="90"
                                    name="register">Submit
                            </button>

                        </div>
                    </div>


                </fieldset>
                <!--                         <fieldset>
                                            <legend>Contact Information</legend>
                                            <div class="form-group">
                                                <label for="inputContactPerson" class="col-md-2 control-label">Name</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control input-sm" id="inputContactPerson" name="inputContactPerson" placeholder="Enter Contact Person Full Name" tabindex="70">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPhone" class="col-md-2 control-label">Phone</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control input-sm" id="inputPhone" name="inputPhone" placeholder="Enter Contact Phone Number" tabindex="80">
                                                    <hr>
                                                    <button type="submit" class="col-md-8 btn btn-primary pull-right" tabindex="90">Submit</button>
                                                </div>
                                            </div>
                                        </fieldset> -->
            </form>

        </div>
    </div>
</div>
<div class="footer"></div>
<script type="text/javascript" src="assets/javascripts/jquery/jquery-2.0.3.min.js">
</script>
<script src="assets/javascripts/jquery/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/javascripts/bootstrap/bootstrap.min.js">
</script>
<script src="assets/javascripts/plugins/supersized/supersized.3.2.7.min.js">
</script>
<script src="assets/javascripts/plugins/supersized/supersized-init.js">
</script>
<script src="assets/javascripts/scripts.js">
</script>
<script src="assets/javascripts/plugins/typeahead/typeahead.js" type="text/javascript"></script>
<script src="assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="assets/javascripts/plugins/addresspicker/jquery.ui.addresspicker.js" type="text/javascript"></script>
<script src="assets/javascripts/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
<script>
    $( document ).ready(function() {

    });
    $('input[name="inputZipcode"]' ).addresspicker(
        {
            appendAddressString: "",
            draggableMarker: false,
            regionBias: 'SG',
            componentsFilter:'country:SG',
            updateCallback: null,
            reverseGeocode: false,
            autocomplete: null,
            elements: {
                map: false,
                lat: "#inputLat",
                lng: "#inputLong",
                street_number: true,
                route: true,
                locality: true,
                administrative_area_level_2: true,
                administrative_area_level_1: true,
                country: false,
                postal_code: true,
                type: false
            },
            autocomplete: 'bootstrap' // could be autocomplete: "bootstrap" to use bootstrap typeahead autocomplete instead of jQueryUI
        }


    );


    $("#btnShowSignUp").click(function () {
        $('#signUpField').show("slow", function () {
            $('#btnShowSignUp').prop('disabled', true);
        });
    });

</script>
<!--
        <script type="text/javascript">
    var status=GetQueryStringParams('status');

    if (status=="RegistrationSucess"){
        $("#status_banner").show();
    }
    else{
        $("#status_banner").hide();
    }
</script>
-->
</body>
</html>
