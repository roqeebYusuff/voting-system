<?php 
    $title = 'Already voted';
    include '../comp/nav.php';
?>

<section id="voted">
    <div class="container">
        <div class="max-vh-100 d-flex justify-content-center align-items-center">
            <div class="card col-lg-6 col-md-8 col-sm-10 col-12">
                <div class="card-body text-center">
                    <h4>You have already cast your vote for this position</h4>
                    <a href="<?php echo $base_url ?>user/dashboard.php" class="btn btn-dark py-2 voteLink mt-3">Go back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo $base_url ?>assets/bootstrap/bootstrap.js"></script>
<script src="<?php echo $base_url ?>assets/jquery/jquery.min.js"></script>