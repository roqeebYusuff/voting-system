<?php 
    $title = 'Voters';
    include './include/header.php'
?>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Voters</h3>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#voterModal"> <i class="ft-plus"></i> New Voter</button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive position-relative">
                                <table id="voterData" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                        </tr>
                                    </thead>

                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="voterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="voterModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Nominee</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addNomineeFrm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="fullname" class="form-label">Fullname</label>
                                        <input type="text" class="form-control" name="fullname" id="fullname">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="club" class="form-label">Club</label>
                                        <input type="text" class="form-control" name="club" id="club">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="text" class="form-control" name="age" id="age">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <input type="text" class="form-control" name="gender" id="gender">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="text" class="form-control" name="image" id="image">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="type" class="form-label">Nomination Type</label>
                                        <select name="type" id="type" class="form-select">
                                            <option value="">--Select Nomination Type--</option>
                                            <option value="one">One</option>
                                            <option value="two">Two</option>
                                            <option value="three">Three</option>
                                        </select>
                                    </div>
                                </div>                                
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Close</button>
                        <button type="button" class="btn btn-outline-secondary" onclick="addNominee()">Save</button>
                    </div>
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
    <script src="<?php echo $base_url ?>assets/custom/js/func.js"></script>
    <script src="<?php echo $base_url ?>assets/datatable/datatables.min.js"></script>

    <script>
        $(document).ready( () => {
            // var tbData
            $('.table-responsive').perfectScrollbar()
            var lurl = "<?php echo $base_url?>user/admin/actions/voters.php?voter"
            tbData = $("#voterData").DataTable({
                lengthChange: true,
                bRetrieve: true,
                sAjaxSource: lurl,
                aoColumns: [
                    { data: "firstname" },
                    { data: "lastname" },
                    { data : "email" },
                    { data : "gender" },
                ]
            })
        })
    </script>

<?php include './include/footer.php' ?>