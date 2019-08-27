$(document).ready(function(){
    $("#signup_btn").click(function(){
        $("#main").animate({left:"22.5%"},400);
        $("#main").animate({left:"30%"},500);
        $("#loginform").css("visibility","hidden");
        $("#loginform").animate({left:"45%"},400);

        $("#signupform").animate({left:"37%"},400);
        $("#signupform").animate({left:"50%"},500);
        $("#signupform").css("visibility","visible");
    });
    $("#login_btn").click(function(){
        $("#main").animate({left:"77.5%"},400);
        $("#main").animate({left:"70%"},500);
        $("#signupform").css("visibility","hidden");
        $("#signupform").animate({left:"35%"},300);

        $("#loginform").animate({left:"65%"},400);
        $("#loginform").animate({left:"50%"},500);
        $("#loginform").css("visibility","visible");
    });
});