$(document).ready(function()
{
    $("#sign_up_opt_btn").click(function()
    {
        $("#SIGNIN").fadeOut();
        $("#SIGNUP").fadeIn();
    });

    $("#sign_in_opt_btn").click(function()
    {
        $("#SIGNIN").fadeIn();
        $("#SIGNUP").fadeOut();
    });
});