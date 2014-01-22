

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
            return true;
        }
    });

    $('.container form .username, .container form .password').keyup(function(){
        $(this).parent().find('.error').fadeOut('fast');
    });

    $('#signUpField').hide();

});
// utilities
function GetQueryStringParams(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}




