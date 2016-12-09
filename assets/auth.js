/**
 * Created by pcsaini on 9/12/16.
 */

$('document').ready(function()
{
   //username and name validation
    var nameregex  = /^([a-zA-Z ])+([a-zA-Z0-9_\.\-\!\@\#\$\%\&\*\_])+$/;
    $.validator.addMethod("validname",function (value, element) {
        return this.optional(element) || nameregex.test(value);
    });

    //email validation
    var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    $.validator.addMethod("validemail", function( value, element ) {
        return this.optional( element ) || eregex.test( value );
    });

    $("#register-form").validate({
        rules:
            {
                username:{
                    required: true,
                    validname: true,
                    minlength: 4,
                    remote:{
                        url: "check.php",
                        type: "post",
                        name: "username",
                        data: {
                            username: function() {
                                return $( "#username" ).val();
                            }
                        }
                    }
                },
                full_name: {
                    required: true,
                    minlength: 4
                },
                email : {
                    required : true,
                    validemail: true,
                    remote: {
                        url: "check.php",
                        type: "post",
                        name: "email",
                        data: {
                            email: function() {
                                return $( "#email" ).val();
                            }
                        }
                    }
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 15
                },
                cpassword: {
                    required: true,
                    equalTo: '#password'
                }
            },
        messages:
            {
                username: {
                    required: "username is required",
                    validname: "username must contain only alphabets",
                    minlength: "your name is too short",
                    remote : "username already exists"
                },
                full_name: {
                    required: "Name is required",
                    minlength: "your name is too short"
                },
                email : {
                    required : "Email is required",
                    validemail : "Please enter valid email address",
                    remote : "Email already exists"
                },
                password:{
                    required: "Password is required",
                    minlength: "Password at least have 6 characters"
                },
                cpassword:{
                    required: "Retype your password",
                    equalTo: "Password did not match !"
                }
            },
        errorPlacement : function(error,element){
            $(element).closest('.form-group').find('.help-block').html(error.html());
        },
        highlight : function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass('has-error');
            $(element).closest('.form-group').find('.help-block').html('');
        },
        submitHandler: submitForm
    });

    function submitForm(){

        var data = $('#register-form').serialize()
        $.ajax({
            type: 'POST',
            url: 'signup_process.php',
            data: data,
            beforeSend: function()
            {
                $("#errorDiv").fadeOut();
                $("#btn-signup").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(response)
            {
                if(response=="ok"){
                    $("#btn-signup").html('<img src="ajax-loader.gif" /> &nbsp; Signing Up ...');
                    setTimeout(' window.location.href = "login.php"; ',4000);
                }
                else{

                    $("#errorDiv").fadeIn(1000, function(){
                        $("#errorDiv").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                        $("#btn-signup").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                    });
                }
            }
        })
    }

    $("#login-form").validate({
        rules:
            {
                password: {
                    required: true
                },
                username: {
                    required: true
                }
            },
        messages:
            {
                password:{
                    required: "please enter your password"
                },
                user_email: {
                    required: "please enter your email address"
                }
            },
        submitHandler: loginsubmitForm
    });
    /* validation */

     /*login submit */
    function loginsubmitForm()
    {
        var data = $("#login-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'login_process.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(response)
            {
                if(response=="ok"){
                    console.log("hello");
                    $("#btn-login").html('<img src="ajax-loader.gif" /> &nbsp; Signing In ...');
                    setTimeout(' window.location.href = "home.php"; ',4000);
                }
                else{

                    $("#error").fadeIn(1000, function(){
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                        $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                    });
                }
            }
        });
        return false;
    }
});