<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/admin_navigation'); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

            <?php $this->load->view('partial/top_bar'); ?>

        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2><span class="fa fa-user"></span> Manage Users</h2>
                <ol class="breadcrumb">
                    <li>
                        Users
                    </li>
                    <li class="active">
                        <strong>Manage Users</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Registered Users
                                <small>Manage Registered Users on the system</small>
                            </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>K.P Jinadasa</td>
                                    <td>Donor</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-sm btn-default btn-outline view" data-user-id="1" data-user-type="donor">View</button>
                                            <button class="btn btn-sm btn-danger delete" data-user-id="1">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>A.M.W Nirmal</td>
                                    <td>Student</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-sm btn-default btn-outline view" data-user-id="1" data-user-type="student">View</button>
                                            <button class="btn btn-sm btn-danger delete" data-user-id="1">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Marino Joseph</td>
                                    <td>CAD</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-sm btn-default btn-outline view" data-user-id="1" data-user-type="cad">View</button>
                                            <button class="btn btn-sm btn-danger delete" data-user-id="1" >Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php $this->load->view('partial/footer'); ?>
        </div>

    </div>
</div>

<!-- Model Student -->
<div class="modal inmodal" id="modelStudent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user modal-icon"></i>
                <h4 class="modal-title">W.P Nirmal</h4>
                <small>A/ Pothana M.V</small>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" class="form-control disabled" name="name" value="W.P Nirmal"
                                       disabled/>
                            </div>
                            <div class="form-group">
                                <label for="address">Address </label>
                                <input type="text" name="address1" class="form-control disabled" disabled
                                       value="Ihala Magama Rd"/>
                                <input type="text" name="address2" class="form-control disabled" disabled
                                       value="Nikawewa"/>
                                <input type="text" name="city" class="form-control disabled" disabled
                                       value="Anuradhapura"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Date of Birth </label>
                                <input name="dob" disabled type="text" class="form-control disabled"
                                       value="15-04-2003"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Contact Number </label>
                                <input name="contact_no" disabled type="text" class="form-control disabled"
                                       value="071-4232885"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Model Donor -->
<div class="modal inmodal" id="modelDonor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user modal-icon"></i>
                <h4 class="modal-title">K.P Jayathilaka</h4>
                <small>HR Manager</small>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" class="form-control disabled" name="name" value="K.P Jayathilaka"
                                       disabled/>
                            </div>
                            <div class="form-group">
                                <label for="address">Address </label>
                                <input type="text" name="address1" class="form-control disabled" disabled
                                       value="No 993/32"/>
                                <input type="text" name="address2" class="form-control disabled" disabled
                                       value="Silvester Rd,"/>
                                <input type="text" name="city" class="form-control disabled" disabled
                                       value="Colombo"/>
                                <input type="text" name="city" class="form-control disabled" disabled
                                       value="Sri Lanka"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">E-Mail Address </label>
                                <input name="email" disabled type="text" class="form-control disabled"
                                       value="kpjayathilaka93@gmail.com"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Contact Number </label>
                                <input name="contact_no" disabled type="text" class="form-control disabled"
                                       value="071-4232885"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Model CAD -->
<div class="modal inmodal" id="modelCAD" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user modal-icon"></i>
                <h4 class="modal-title">Marino Joseph</h4>
                <small>Project Coordinator</small>
            </div>
            <form action="#" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" class="form-control disabled" name="name" value="Marino Joseph"
                                       disabled/>
                            </div>
                            <div class="form-group">
                                <label for="name">E-Mail Address </label>
                                <input name="email" disabled type="text" class="form-control disabled"
                                       value="kpjayathilaka93@gmail.com"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="contact_no">Contact Number </label>
                                <input name="contact_no" disabled type="text" class="form-control disabled"
                                       value="071-4232885"/>
                            </div>
                            <div class="form-group">
                                <label for="position">Contact Number </label>
                                <select name="position" id="position" class="form-control">
                                    <option value="Project Manager">Project Manager</option>
                                    <option value="Project Coordinator">Project Coordinator</option>
                                    <option value="Team Member">Team Member</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Mainly scripts -->
<?php $this->load->view('partial/common_js'); ?>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>

<!-- Data Tables -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

<script>
    $(document).ready(function () {
        $('.view').click(function (e) {
            e.preventDefault();
            var userId = $(this).data('user-id');
            alert(userId);
            var userType = $(this).data('user-type');
            alert(userType);
            //console.log(school);
            /*$.ajax({
             type: "POST",
             dataType: 'json',
             url: "
            <?php //echo base_url('administrator/get_single_classroom/'); ?>",
             data: {classroom_id: classroom},
             success: function (data) {
             //console.log(data);
             //console.log(data.total);
             for (var i = 0; i < data.total.length; i++) {
             var school_name = data.total[i].sch_id;
             $("select option").filter(function () {
             //may want to use $.trim in here
             return $(this).val() == school_name;
             }).attr('selected', true);
             $('#classroom_name').val(data.total[i].classroom_name);
             $('#class_teacher_name').val(data.total[i].teacher_name);
             $('#classroom_id').val(data.total[i].classroom_id);
             }
             ;

             }
             });*/
            switch(userType){
                case 'student':
                    $('#modelStudent').modal('show');
                    break;
                case 'donor':
                    $('#modelDonor').modal('show');
                    break;
                case 'cad':
                    $('#modelCAD').modal('show');
                    break;
            }


        });

        $('.dataTables-example').dataTable({
            responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url('assets'); ?>/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });

        var success = <?php echo 'true';?>;

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }

        if (success) {
            toastr.success('Notification');
        }

    });
</script>

</body>

</html>
