$(document).ready(function () {
    $('#login-validate').submit(function() {
        // e.preventDefault();
        function validateEmail(login) {
            var re = /^(([a-zA-Z0-9]+)|([a-zA-Z0-9]+((?:\_[a-zA-Z0-9]+)|(?:\.[a-zA-Z0-9]+))*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-zA-Z]{2,6}(?:\.[a-zA-Z]{2})?)$)/;
            return re.test(login);
        }
        var login = $("#login").val();
        var pass=$('#password').val();
        if(login.length<1){
            // console.log("Username or Email is Required");
            $('.jerror').html('<span class="error">Username or Email is Required</span>');
            return false;
        }
        else if(!validateEmail(login)){
            if(login.length<6 || login.length>10){
                // console.log("Username should be between 6 to 10 characters!!");
                $('.jerror').html('<span class="error">Username should be between 6 to 10 characters!!</span>');
                return false;
            }
        }

        // console.log(pass);
        if(pass.length<1){
            $('.perror').html('<span class="error">Please Enter Password!!</span>');
            return false;
        }
        if(pass.length<6 || pass.length>10){
            $('.perror').html('<span class="error">Password must be greater than 6 and less than 10 characters!!</span>');
            return false;
        }
        else{
            $('.perror').hide();
        }
    });
    return true;
});
