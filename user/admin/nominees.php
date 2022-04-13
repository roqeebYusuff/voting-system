<?php 
    $title = 'Nominees';
    include './include/header.php';

    $cmd = 'SELECT * FROM nom_types';
    $res = executeQuery($cmd);
?>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Nominees</h3>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#NomineeAdd"> <i class="ft-plus"></i> New Nominee</button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive position-relative">
                                <table id="nomineeData" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Club</th>
                                            <th>Type</th>
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
        
        <div class="modal fade" id="NomineeAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="NomineeAdd" aria-hidden="true">
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
                                            <?php while($row = mysqli_fetch_array($res)): ?>
                                                <option value="<?php echo $row['type'] ?>"><?php echo $row['type'] ?></option>
                                            <?php endwhile; ?>
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
            var lurl = "<?php echo $base_url?>user/admin/actions/nominees.php?nominee"
            tbData = $("#nomineeData").DataTable({
                lengthChange: true,
                bRetrieve: true,
                sAjaxSource: lurl,
                aoColumns: [
                    { data: "fullname" },
                    { data: "club" },
                    { data : "type" }
                ]
            })
        })

        function addNominee(){
            if(!$('#addNomineeFrm').valid()){
                return
            }

            var frmData = {}
            var data = $('#addNomineeFrm').serializeArray()

            $.each(data, (key, input) => {
                frmData[input.name] = input.value
            })

            $('#preloader').fadeIn()
            $.ajax({
                type: 'POST',
                url: '<?php echo $base_url?>user/admin/actions/nominees.php?addnominee',
                data: frmData
            })
            .done( (response) => {
                if(response == 'success'){
                    tbData.ajax.reload()
                    successToast('Success', 'Successfully added')
                    $('#addNomineeFrm')[0].reset()
                    $('#NomineeAdd').modal('hide')
                }
                else{
                    errorToast('Error', 'Error occurred')
                }   
            })
            .fail( () => {
                warningToast('Error', 'Error')
            })
            .always( () => {   
                $('#preloader').fadeOut()
            })
        }

        function deleteNominee(id){
            $.ajax({
                type: 'POST',
                url: "<?php echo $base_url?>user/admin/actions/nominees.php?type=nominee"
            })
            .done( () => {

            })
            .fail( () => {

            })
            .always( () => {

            })
        }
    </script>

<?php include './include/footer.php' ?>