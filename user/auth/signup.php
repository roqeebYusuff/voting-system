<?php 

    $base_url = 'http://localhost/poll(mod)/';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Roqvoty - Sign up</title>
        
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/custom/css/main.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/toast/iziToast.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/fonts/bootstrap-icons/bootstrap-icons.css">
    </head>
    <body>
        <section id="auth">
            <div class="container">
                <div class="min-vh-100 d-flex justify-content-center align-items-center">
                    <div class="card shadow border-0 col-lg-6 col-md-8 my-3">
                        <div class="card-body m-3">
                            <h3 class="text-center">Roqvoty</h3>
                            <h5 class="m-0">Sign up</h5>
                            <p class="m-0 text-muted">Create your account</p>
                            <form class="mt-2" id="signupForm">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="firstname">Firstname</label>
                                            <input type="text" class="form-control" name="firstname" id="firstname">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="lastname">Lastname</label>
                                            <input type="text" class="form-control" name="lastname" id="lastname">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-select">
                                            <option value="">-Select Gender-</option> 
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <div class="d-flex justify-content-between align-items-center showHide">
                                                <label for="password" class="form-label">Password</label>
                                                <i class="bi bi-eye-fill"></i>
                                            </div>
                                            <input type="password" class="form-control" name="password" id="password">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <div class="d-flex justify-content-between align-items-center showHide">
                                                <label for="conpassword" class="form-label">Confirm Password</label>
                                                <i class="bi bi-eye-fill"></i>
                                            </div>
                                            <input type="password" class="form-control" name="conpassword" id="conpassword">
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <button type="button" onclick="register()"  class="btn btn-dark shadow w-100">Sign up</button>
                                    </div>
                                </div>

                                <p class="m-0 mt-3 text-center">
                                    Already have an account? <a href="<?php echo $base_url ?>user/auth/signin.php">Sign in.</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="<?php echo $base_url ?>assets/bootstrap/bootstrap.js"></script>
        <script src="<?php echo $base_url ?>assets/jquery/jquery.min.js"></script>
        <script src="<?php echo $base_url ?>assets/jquery/validate.min.js"></script>
        <script src="<?php echo $base_url ?>assets/toast/iziToast.min.js"></script>
        <script src="<?php echo $base_url ?>assets/custom/js/formValidations.js"></script>
        <script src="<?php echo $base_url ?>assets/custom/js/toasts.js"></script>

        <script>
            $(document).ready( () => {
                $('.showHide > i').click( function() {
                    $(this).toggleClass('bi-eye-fill bi-eye-slash-fill')
                    inputField = $(this).parent().next('input')
                    inputField.attr('type', inputField.attr('type') === 'password' ? 'text' : 'password')
                })
            })

            function register(){
                if(!$('#signupForm').valid()){
                    return
                }
                var target = $('#signupForm button')
                
                var frmData = {}
                var data = $('#signupForm').serializeArray()

                $.each(data, function(key, input){
                    frmData[input.name] = input.value
                })

                target.addClass('disabled').html('<span class="spinner-border spinner-border-sm me-2"></span> Signing in...');
                
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url ?>lib/signup.php',
                    data: frmData
                })
                .always( () => {
                    target.removeClass('disabled').html('Sign up')
                })
                .done( (response) => {
                    if(response == 'success'){
                        successToast('success', 'Registration successfull...You are being redirected');
                        $('#signupForm')[0].reset()
                        setTimeout( ()=> {
                            document.location = '<?php echo $base_url ?>user/auth/signin.php'
                        }, 4000)
                    }
                    else{
                        warningToast('Error', response)
                    }
                })
                .fail( (response) => {
                    errorToast('Error', 'An error occured, Try again.')
                })
            }
        </script>
    </body>
</html>