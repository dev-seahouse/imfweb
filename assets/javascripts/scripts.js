

/* -------------- Login Page function-------------*/
jQuery(document).ready(function() {

    $('#loginpg.container form').submit(function(){
        var username = $(this).find('.username').val();
        var password = $(this).find('.password').val();
        if(username == '') {
            $(this).find('.error').fadeOut('fast', function(){
                $(this).css('top', '41px');
            });
            $(this).find('.error').fadeIn('fast', function(){
                $(this).parent().find('.username').focus();
            });
            return false;
        }
        else if(password == '') {
            $(this).find('.error').fadeOut('fast', function(){
                $(this).css('top', '143px');
            });
            $(this).find('.error').fadeIn('fast', function(){
                $(this).parent().find('.password').focus();
            });
            return false;
        }
        else {
            window.location.href="test.html";
            return false;
        }
    });

    $('.container form .username, .container form .password').keyup(function(){
        $(this).parent().find('.error').fadeOut('fast');
    });
    
    $('#signUpField').hide();


});





