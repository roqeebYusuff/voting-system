<?php 
    $title = 'Dashboard';
    include './include/header.php'
?>
            <div class="container">
                <h4>Hello, Admin</h4>
                <div class="row">
                    <div class="col-md-4 col-4">
                        <div class="single-card shadow">
                            <h6 class="m-0 opacity-50">Candidates</h6>
                            <h3 class="m-0" id="countNom"></h3>
                        </div>
                    </div>
        
                    <div class="col-md-4 col-4">
                        <div class="single-card shadow">
                            <h6 class="m-0 opacity-50">Voters</h6>
                            <h3 class="m-0" id="countVot"></h3>
                        </div>
                    </div>

                    <div class="col-md-4 col-4">
                        <div class="single-card shadow">
                            <h6 class="m-0 opacity-50">Awards</h6>
                            <h3 class="m-0">4</h3>
                        </div>
                    </div>
                </div>

                <div class="row mt-2 gy-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6>Chart</h6>
                                    <select class="form-select" name="" id="chartSelect" style="width: auto;">
                                        <option value="Striker">Striker</option>
                                        <option value="Midfielder">Midfielder</option>
                                        <option value="Defender">Defender</option>
                                        <option value="Keeper">Keeper</option>
                                    </select>
                                </div>

                                <div id="votesChart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6>Nominees</h6>
                                    <select class="form-select" name="" id="nomSelect" style="width: auto;">
                                        <option value="Striker">Striker</option>
                                        <option value="Midfielder">Midfielder</option>
                                        <option value="Defender">Defender</option>
                                        <option value="Keeper">Keeper</option>
                                    </select>
                                </div>
                                <div class="table-responsive mt-2">
                                    <table id="nomData" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Club</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card border-0" style="border-radius: 5px;">
                            <div class="card-body">
                                <h6>Recent Registered Voters</h6>
                                <div class="table-responsive mt-2">
                                    <table id="votData" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Email</th>
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
    <script src="<?php echo $base_url ?>assets/xhart/apexcharts.js"></script>
    <script src="<?php echo $base_url ?>assets/custom/js/chart.js"></script>

    <script>
        $(document).ready( () => {
            votesChart('<?php echo $base_url ?>user/admin/actions/dashboard.php?type=striker')
            counts('<?php echo $base_url ?>user/admin/actions/dashboard.php?fvoters')

            // $('.table-responsive').perfectScrollbar()
            var lurl = "<?php echo $base_url?>user/admin/actions/dashboard.php?ntype=Striker"
            var tbData = $("#nomData").DataTable({
                lengthChange: true,
                bRetrieve: true,
                sAjaxSource: lurl,
                aoColumns: [
                    { data: "fullname" },
                    { data: "club" }
                ]
            })

            var murl = "<?php echo $base_url?>user/admin/actions/dashboard.php?voter"
            var mbData = $("#votData").DataTable({
                lengthChange: true,
                bRetrieve: true,
                sAjaxSource: murl,
                aoColumns: [
                    { data: "firstname" },
                    { data: "lastname" },
                    { data: "email" }
                ]
            })

            $('#chartSelect').change( function() {
                $('#votesChart').empty()
                var tval = $(this).val()
                votesChart(`<?php echo $base_url ?>user/admin/actions/dashboard.php?type=${tval}`)
            })

            $('#nomSelect').change( function() {
                var tval = $(this).val()
                tbData.ajax.url(`<?php echo $base_url?>user/admin/actions/dashboard.php?ntype=${tval}`).load();
            })
        })
    </script>

<?php include './include/footer.php' ?>