<?php 
    session_start();
    include '../../lib/lib.php';

    $message = '';
    if(isset($_POST['signin'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $cmdtext = "SELECT * FROM voters WHERE email = '$email'";
        $res = executeQuery($cmdtext);

        if(!empty(mysqli_num_rows($res))){
            $ress = mysqli_fetch_array($res);
            //Verify Password
            $ver = verifyPassword($password, $ress['password']);
            if($ver){
                //Set session and redirect to main
                $_SESSION['roqvotyUser'] = $ress;
                redirect($base_url.'user/dashboard.php');
            }
            else{
                $message = 'Invalid email or password';
            }
        }
        else{
            $message = 'Invalid email or password';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signin - Roqvoty</title>

        <link rel="stylesheet" href="<?php echo $base_url ?>assets/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/custom/css/main.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/toast/iziToast.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/fonts/bootstrap-icons/bootstrap-icons.css">
    </head>
    <body>
        <section id="auth">
            <div class="container">
                <div class="min-vh-100 d-flex justify-content-center align-items-center">
                    <div class="card shadow border-0 col-lg-6 col-md-8">
                        <div class="card-body m-3">
                            <h3 class="text-center">Roqvoty</h3>
                            <h5 class="m-0">Sign in</h5>
                            <p class="m-0 text-muted">Sign in to continue</p>
                            <form method="POST" class="mt-2" id="signinForm">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <div class="float-end">
                                                <i class="bi bi-eye-fill" id="showHide" style="font-size: 18px;"></i>
                                            </div>
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password">
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <button onclick="loginn()" name="signin" class="btn btn-dark shadow w-100">Sign in</button>
                                    </div>
                                </div>

                                <p class="m-0 mt-3 text-center">
                                    Don’t have an account? <a href="<?php echo $base_url ?>user/auth/signup.php">Sign up.</a>
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
                var message = '<?php echo $message ?>'
                if(message != ''){
                    errorToast('Error', message)
                }

                $('#showHide').click( () => {
                    $('#password').attr('type', $('#password').attr('type') === 'password' ? 'text' : 'password')
                    $('#showHide').toggleClass('bi-eye-fill bi-eye-slash-fill')
                })
            })

            function loginn(){
                if(!$('#signinForm').valid()){
                    return
                }
                var target = $('#signinForm button')
                target.addClass('disabled').html('<span class="spinner-border spinner-border-sm me-2"></span> Signing in...');
            }
        </script>
    </body>
</html>