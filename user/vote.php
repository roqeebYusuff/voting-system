<?php 
    $title = 'Vote';
    include '../comp/header.php';
    
    if(isset($_GET["type"])){
        $type =  $_GET['type'];

        $cmdtext = "SELECT * FROM votes WHERE `voter_id` = '$voterId' and `type` = '$type'";
        $r = executeQuery($cmdtext);
        if(mysqli_num_rows($r) > 0){
            redirect($base_url.'user/voted.php');
        }
        else{
            $cmd = "SELECT * FROM nominees where `type` = '$type'";
            $res = executeQuery($cmd);
        }
    }
    else{
        redirect($base_url.'user/dashboard.php');
    }

?>

<section id="vote">
    <div class="container">
        <div class="max-vh-100 d-flex justify-content-center align-items-center">
            <div class="card col-lg-6 col-md-8 col-sm-10 col-12">
                <div class="card-body">
                    <h4>Select your vote</h4>
                    <ul class="col-12 candidates p-0" id="candidates">
                        <?php while($row = mysqli_fetch_array($res)): ?>
                            <li class="single-cand d-flex align-items-center" data-id="<?php echo $row['nominee_id'] ?>">
                                <div class="image">
                                    <img class="img-fluid" src="<?php echo $base_url ?>assets/img/nom/<?php echo $row['image'] ?>" alt="#candidate">
                                </div>
                                <div class="det">
                                    <h5><?php echo $row['fullname'] ?></h5>
                                    <span><?php echo $row['club'] ?></span>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>  

                    <button class="btn btn-dark py-3 w-100" onclick="saveVote()">Vote</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo $base_url ?>assets/bootstrap/bootstrap.js"></script>
<script src="<?php echo $base_url ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo $base_url ?>assets/jquery/validate.min.js"></script>
<script src="<?php echo $base_url ?>assets/custom/js/formValidations.js"></script>
<script src="<?php echo $base_url ?>assets/toast/iziToast.min.js"></script>
<script src="<?php echo $base_url ?>assets/custom/js/toasts.js"></script>
<script src="<?php echo $base_url ?>assets/scroll/perfect-scrollbar.jquery.js"></script>

<script>
    $(document).ready( () => {
        $('#candidates').perfectScrollbar()

        $('.single-cand').mousedown( function (){
            if($(this).hasClass('selected-cand')){
                $(this).removeClass('selected-cand')
            }
            else{
                $('.selected-cand').removeClass('selected-cand')
                $(this).addClass('selected-cand')
                id = $(this).data('id')
            }
        })

    })
    
    function saveVote(){
        //FInd selected
        if($('.selected-cand').length){
            var nom_id = $('.selected-cand').data('id')
            var frmData = {
                voter_id: '<?php echo $voterId ?>',
                nominee_id: nom_id,
                type: '<?php echo $type ?>',
            }
            $.ajax({
                type: 'POST',
                url: '<?php echo $base_url?>user/action/vote.php?vote',
                data: frmData
            })
            .done( (response) => {
                if(response == 'success'){
                    successToast('success', 'Successfully Voted...You are being redirected')
                    setTimeout( ()=> {
                        document.location = '<?php echo $base_url ?>user/dashboard.php'
                    }, 3000)
                }
                else{
                    errorToast('error', 'Unable to vote...Try again')
                }
            })
            .fail( (response) => {
                errorToast('error', response)
            })
        }
        else{
            errorToast('error', 'Select your vote')
        }
    }

    function logout(){
        document.location = '<?php echo $base_url ?>/user/auth/signout.php'
    }
</script>