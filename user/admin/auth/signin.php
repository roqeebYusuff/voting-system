<?php 
    session_start();
    include '../../../lib/lib.php';

    $message = '';
    if(isset($_POST['signin'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $cmdtext = "SELECT * FROM `admin` WHERE username = '$username'";
        $res = executeQuery($cmdtext);

        if(mysqli_num_rows($res) > 0){
            $ress = mysqli_fetch_array($res);
            //Verify Password
            $ver = verifyPassword($password, $ress['password']);
            if($ver){
                //Set session and redirect to main
                $_SESSION['roqvotyAdmin'] = $ress;
                redirect($base_url.'user/admin');
            }
            else{
                $message = 'Invalid username or password';
            }
        }
        else{
            $message = 'Invalid username or password';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Roqvoty</title>

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
                            <h5 class="m-0">Admin Sign in</h5>
                            <p class="m-0 text-muted">Sign in to continue</p>
                            <form method="POST" class="mt-2" id="AsigninForm">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="username">
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
                                        <button onclick="login()" name="signin" class="btn btn-dark shadow w-100">Sign in</button>
                                    </div>
                                </div>
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

            function login(){
                if(!$('#AsigninForm').valid()){
                    return
                }
                var target = $('#AsigninForm button')
                target.addClass('disabled').html('<span class="spinner-border spinner-border-sm me-2"></span> Signing in...');
            }
        </script>
    </body>
</html>