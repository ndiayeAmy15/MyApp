 $('#register-user').click(function(){

     var firstname = $('#firstname').val();
     var lastname = $('#lastname').val();
     var email = $('#email').val();
     var password = $('#password').val();
     var passwordlength = password.length;
     var confirm_password = $('#confirm-password').val();
     var agree_terms = $('#agree-terms');

     if (firstname != "" && /^[a-zA-Z]+$/.test(firstname)) {
        $('#firstname').removeClass('is-invalid');
        $('#firstname').addClass('is-valid');
        $('#error-register-firstname').text("");
     } else {
         $('#firstname').addClass('is-invalid');
         $('#firstname').removeClass('is-valid');
         $('#error-register-firstname').text("firstname is invvalid");
     }
     
     if (email != "" && /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email)) {
        $('#email').removeClass('is-invalid');
        $('#email').addClass('is-valid');
        $('#error-register-email').text("");
     } else {
         $('#email').addClass('is-invalid');
         $('#email').removeClass('is-valid');
         $('#error-register-email').text("email is invvalid");
     }
     if (password != "" && /^[a-zA-Z0-9]{6,9}$/.test(password) && passwordlength>=8) {
        $('#password').removeClass('is-invalid');
        $('#password').addClass('is-valid');
        $('#error-register-password').text("");
     } else {
         $('#password').addClass('is-invalid');
         $('#password').removeClass('is-valid');
         $('#error-register-password').text("password is invalid");
     }

     if (confirm_password != "" && confirm_password==password && /^[a-zA-Z0-9]{6,9}$/.test(confirm_password) && passwordlength>=8) {
        $('#confirm_password').removeClass('is-invalid');
        $('#confirm_password').addClass('is-valid');
        $('#error-register-confirm_password').text("");
        
     } else {
         $('#confirm_password').addClass('is-invalid');
         $('#confirm_password').removeClass('is-valid');
         if(confirm_password!=password){
            $('#error-register-confirm_password').text("confirm_password is not password");
         }
         $('#error-register-confirm_password').text("confirm_password is invalid");
         
     }

     if(agree_terms.is(':checked')){
        $('#agree-terms').removeClass('is-invalid');
        $('#agree-terms').addClass('is-valid');
        $('#error-register-agree-terms').text("");
     }else{ 
        $('#agree-terms').addClass('is-invalid');
        $('#agree-terms').removeClass('is-valid');
        $('#error-register-agree-terms').text("agree-terms is invalid");
     }
     $('#form-register').submit();
 });

$('#agree-terms').change(function(){
    var agree_terms = $('#agree-terms');
    if(agree_terms.is(':checked')){
        $('#agree-terms').removeClass('is-invalid');
        $('#error-register-agree-terms').text("");
     }else{
        $('#agree-terms').addClass('is-invalid');
        $('#error-register-agree-terms').text("agree-terms is invalid");
     }
});



// const register_user = document.body.querySelector('#register-user');
// register_user.addEventListener('click',function(){
//     console.log('ok');
//     var firstname=document.getElementById('firstname');
//     var lastname=document.getElementById('lastname');
//     var email=document.getElementById('email');
//     var confirm_password=document.getElementById('confirm-password');
//     var agree_terms=document.getElementById('agree-terms');
//     var passwordlength = password.length;
//     if (firstname.value = "") {
//         console.log('ok');
//     }

// });
