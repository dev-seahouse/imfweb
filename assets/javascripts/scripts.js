/* -------------- Login Page function-------------*/
jQuery(document).ready(function() {

    $('#frmLogin').submit(function() {
        var username = $(this).find('.username').val();
        var password = $(this).find('.password').val();
        if (username === '') {
            $(this).find('.error').fadeOut('fast', function() {
                $(this).css('top', '41px');
            });
            $(this).find('.error').fadeIn('fast', function() {
                $(this).parent().find('.username').focus();
            });
            return false;
        } else if (password === '') {
            $(this).find('.error').fadeOut('fast', function() {
                $(this).css('top', '143px');
            });
            $(this).find('.error').fadeIn('fast', function() {
                $(this).parent().find('.password').focus();
            });
            return false;
        } else {
            event.preventDefault();

            var $form = $(this),
                $submit = $form.find('button[type="submit"]'),
                username_value = $form.find('input[name="username"]').val(),
                password_value = $form.find('input[name="password"]').val(),
                url = $form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                dataType: 'text',
                crossDomain: true,
                data: {
                    username: username_value,
                    password: password,
                    btnSignin: 1
                },
                success: function(response) {
                    $('status_message').show();
                    $('#status_message').html(response);

                    $('#status_message').show();
                    $('body').scrollTop(0);

                },
                error: function() {
                    console.log("something wrong with login");
                }
            });
        }
    });

    $('.container form .username, .container form .password').keyup(function() {
        $(this).parent().find('.error').fadeOut('fast');
    });

    $('#signUpField').hide();
    $('#status_message').hide();

    //registration submit function
    $('#frmSignup').submit(function(event) {
        //prevent form from submitting normally
        event.preventDefault();
        //alert("hgi");
        //declare variables

        var $form = $(this),
            $submit = $form.find('button[type="submit"]'),
            inputUserName_value = $form.find('input[name="inputUserName"]').val(),
            inputPasswd_value = $form.find('input[name="inputPasswd"]').val(),
            inputEmail_value = $form.find('input[name="inputEmail"]').val(),
            inputConfirmPasswd_value = $form.find('input[name="inputConfirmPasswd"]').val();
        url = $form.attr('action');
        //sending data via post
        //alert(inputUserName_value);
        //window.location.href = "controllers/processregister.php";

        $.ajax({
            type: "POST",
            url: url,
            crossDomain: true,
            data: {
                inputUserName: inputUserName_value,
                inputPasswd: inputPasswd_value,
                inputConfirmPasswd: inputConfirmPasswd_value,
                inputEmail: inputEmail_value,
                register: 1
            },
            dataType: 'text',
            timeout: 1000,
            success: function(response) {
                $('#status_message').html(response);
                $('body').scrollTop(0);
                $('#status_message').show();
                //console.log(response);
            },
            error: function() {
                console.log("Connection Error. Please try again later.");
            }
        });
        /*
        var posting=$.post(
            url,
            {
                inputUserName:inputUserName_value,
                inputPasswd:inputPasswd_value,
                inputConfirmPasswd:inputConfirmPasswd_value,
                inputEmail:inputEmail_value,
                register:1
            }
        );
        /*
        alert(posting);
        posting.done(function(data){
            $('#status_message').html(data);
        });
        */
    });

});
// utilities
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