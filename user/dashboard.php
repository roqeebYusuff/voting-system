<?php 
    $title = 'Dashboard';
    include '../comp/nav.php';
?>
        <section class="welcome" style="margin-top: 5rem;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-body p-0">
                                <div class="post-card">
                                    <div class="card-title">
                                        <h4>Striker of The Year</h4>
                                    </div>
                                    <div class="others d-flex flex-column">
                                        <div class="heads" id="strikers"></div>
                                        <div class="col-12 mt-3">
                                            <a href="<?php echo $base_url ?>user/vote.php?type=Striker" class="btn btn-dark w-100 py-2 voteLink">Vote</a>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-body p-0">
                                <div class="post-card">
                                    <div class="card-title">
                                        <!-- <i class="bi bi-heart-fill"></i> -->
                                        <h4>Midfielder of The Year</h4>
                                    </div>
                                    <div class="others d-flex flex-column">
                                        <div class="heads" id="midfielder"></div>
                                        <div class="col-12 mt-3">
                                            <a href="<?php echo $base_url ?>user/vote.php?type=Midfielder" class="btn btn-dark w-100 py-2 voteLink">Vote</a>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-body p-0">
                                <div class="post-card">
                                    <div class="card-title">
                                        <!-- <i class="bi bi-heart-fill"></i> -->
                                        <h4>Defender of The Year</h4>
                                    </div>
                                    <div class="others d-flex flex-column">
                                        <div class="heads" id="defender"></div>
                                        <div class="col-12 mt-3">
                                            <a href="<?php echo $base_url ?>user/vote.php?type=Defender" class="btn btn-dark w-100 py-2 voteLink">Vote</a>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-body p-0">
                                <div class="post-card">
                                    <div class="card-title">
                                        <!-- <i class="bi bi-heart-fill"></i> -->
                                        <h4>Keeper of The Year</h4>
                                    </div>
                                    <div class="others d-flex flex-column">
                                        <div class="heads" id="keeper"></div>
                                        <div class="col-12 mt-3">
                                            <a href="<?php echo $base_url ?>user/vote.php?type=Keeper" class="btn btn-dark w-100 py-2 voteLink">Vote</a>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="<?php echo $base_url ?>/assets/bootstrap/bootstrap.js"></script>
        <script src="<?php echo $base_url ?>/assets/jquery/jquery.min.js"></script>
        <script src="<?php echo $base_url ?>/assets/jquery/validate.min.js"></script>
        <script src="<?php echo $base_url ?>/assets/custom/js/formValidations.js"></script>
        <script src="<?php echo $base_url ?>/assets/custom/js/toasts.js"></script>
        <script src="<?php echo $base_url ?>/assets/custom/js/func.js"></script>
        
        <script>
            $(document).ready( () => {
                loadNominees('<?php echo $base_url?>user/action/dashboard.php?fetch')
            })

            function logout(){
                document.location = '<?php echo $base_url ?>/user/auth/signout.php'
            }
        </script>
    </body>
</html>