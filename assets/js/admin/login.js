



$(document).ready(function () {
const site_url = "http://localhost/ssit5-project/";

    $('#showSignUpForm').click(function (){
        $("#login-form-box").hide();
        $("#register-form-box").show();
    });

    $('#showSignInForm').click(function (){
        $("#register-form-box").hide();
        $("#login-form-box").show();
    
    });

    $('#showForgetForm').click( function(){
        $("#login-form-box").hide();
        $("#forgotten-form-box").show();
    });

    $('#back').click(function (){  
       
        $("#forgotten-form-box").hide();
        $("#login-form-box").show();
    } );


    $('#registerUser').click( function (e) {
        if($("#register-form")[0].checkValidity()){
            e.preventDefault();
            $('#registerUser').val("...loading").attr('disabled', true);
        }
       


       if($("#name").val() === ''){
           $("#name").addClass("is-invalid");
       }else{
           $("#name").removeClass("is-invalid");  
       }

       
       if($("#email").val() === ''){
           $("#email").addClass("is-invalid");
       }else{
           $("#email").removeClass("is-invalid");  
       }

        
       if($("#r_password").val() === ''){
           $("#r_password").addClass("is-invalid");
       }else{
           $("#r_password").removeClass("is-invalid");  
       }

        
       if($("#r_password").val() !==   $("#c_password").val() ){
           $("#c_password").addClass("is-invalid");
       }else{
           $("#c_password").removeClass("is-invalid");  
       }



       if($("#r_password").val() === $("#c_password").val()){

        console.log("start ajax")
         $.ajax( {
                url: site_url + "admin/action.php", 
                method: 'post',
                data: $("#register-form").serialize() + '&action=register',
                success: function(response){ 
                    
                    var res =  JSON.parse(response);
                    // if(res.status == 'done')
                    // if(response == '1') 
                    if(res.status == 'done'){
                        console.log('heloo');
                         window.location = 'dashboard.php';
                        }else{
                          console.log("else r vitore")
                            $('#registerError').html(response);
                        }
                
                    $("#register-form")[0].reset();
                }
           })
      }
 $('#registerUser').val("Register").attr('disabled', false)
    
} ); 


$('#loginBtn').click( function(e){
   if( $('#login-form')[0].checkValidity()){
    e.preventDefault();
    $('#loginBtn').val('Loading').attr('disabled', true);
    console.log('before ajx');
    $.ajax( {
        url: site_url + "admin/action.php", 
        method: 'post',
        data: $("#login-form").serialize() + '&action=login',
    
        success: function(response){ 
            console.log(response);
            $('#loginBtn').val('Sign in').attr('disabled', false);
            console.log('ajx before res');

            var res =  JSON.parse(response);
            console.log(JSON.stringify(res));
          
            if(res.status == 'done'){
                console.log('inside if ajx');
                     window.location = 'dashboard.php';
                }else{
                    $('#loginError').html(response);
                }
        
            $("#register-form")[0].reset();
        }
   })
   }
});


$('#resetPassword').click( function(e){
    if( $('#forgotten-form')[0].checkValidity()){
     e.preventDefault();
     $('#resetPassword').val('Loading').attr('disabled', true);
     if($("#email2").val() === ''){
        $("#email2").addClass("is-invalid");
    }else{
        $.ajax( {
            url: site_url + "admin/action.php", 
            method: 'post',
            data: $("#forgotten-form").serialize() + '&action=reset-password',
        
            success: function(response){ 
               console.log(response);
               $('#resetPassword').val('Rest Pass').attr('disabled', false);
               $("#restPasswordError").html(response);
               $("#email2").val('');
            }
       });
       
    }

    console.log('end ajx');
    }
 });

 $('#forgotBtn').click( function(e){
    if( $('#forgot-password-form')[0].checkValidity()){
            e.preventDefault();
            $('#forgotBtn').val('Loading.....').attr('disabled', true);
            if($("#password").val() === ''){
                $("#password").addClass("is-invalid");
            }else{
                $("#password").removeClass("is-invalid");
            }

            if($("#password").val() !== '' && $('#confirm_password').val() !== '' ){
                if($("#password").val() === $('#confirm_password').val()){
                $("#confirm_password").removeClass("is-invalid");
                $.ajax( {
                    url: site_url + "admin/action.php", 
                    method: 'post',
                    data: $("#forgot-password-form").serialize() + '&action=reset',
                
                    success: function(response){ 
                       console.log(response);
                       $('#forgotBtn').val('Reset Password').attr('disabled', false);
                       $("#forgotError").html(response);
                       $("#email2").val('');
                       $("#password").val('');
                       $("#confirm_password").val('');
                    }
               });
                console.log('ok')
            }else{
                    $("#confirm_password").addClass("is-invalid");
               }
            } else{
                $('#forgotBtn').val('Reset Password').attr('disabled', false);
            }
        }
   } );


  
 });