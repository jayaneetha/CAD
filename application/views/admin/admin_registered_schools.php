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
                <h2><span class="fa fa-bank"></span> Registered Schools</h2>
                <ol class="breadcrumb">
                    <li>
                        School
                    </li>
                    <li class="active">
                        <strong>Registered Schools</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Registered Schools
                                <small>Manage Registered Schools on the system</small>
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
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Principal</th>
                                    <th>Contact Number</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>A/Nikawewa M.V</td>
                                    <td>Ihala Magama Rd, Nikawewa</td>
                                    <td>Anuradhapura</td>
                                    <td>Mr. K S Sumanapala</td>
                                    <td>071-4232885</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1" data-toggle="modal"
                                                    data-target="#modelSchool">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>A/Nikawewa M.V</td>
                                    <td>Ihala Magama Rd, Nikawewa</td>
                                    <td>Anuradhapura</td>
                                    <td>Mr. K S Sumanapala</td>
                                    <td>071-4232885</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1" data-toggle="modal"
                                                    data-target="#modelSchool">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>A/Nikawewa M.V</td>
                                    <td>Ihala Magama Rd, Nikawewa</td>
                                    <td>Anuradhapura</td>
                                    <td>Mr. K S Sumanapala</td>
                                    <td>071-4232885</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1" data-toggle="modal"
                                                    data-target="#modelSchool">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>A/Nikawewa M.V</td>
                                    <td>Ihala Magama Rd, Nikawewa</td>
                                    <td>Anuradhapura</td>
                                    <td>Mr. K S Sumanapala</td>
                                    <td>071-4232885</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1" data-toggle="modal"
                                                    data-target="#modelSchool">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>A/Nikawewa M.V</td>
                                    <td>Ihala Magama Rd, Nikawewa</td>
                                    <td>Anuradhapura</td>
                                    <td>Mr. K S Sumanapala</td>
                                    <td>071-4232885</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1" data-toggle="modal"
                                                    data-target="#modelSchool">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>A/Nikawewa M.V</td>
                                    <td>Ihala Magama Rd, Nikawewa</td>
                                    <td>Anuradhapura</td>
                                    <td>Mr. K S Sumanapala</td>
                                    <td>071-4232885</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1" data-toggle="modal"
                                                    data-target="#modelSchool">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>A/Nikawewa M.V</td>
                                    <td>Ihala Magama Rd, Nikawewa</td>
                                    <td>Anuradhapura</td>
                                    <td>Mr. K S Sumanapala</td>
                                    <td>071-4232885</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1" data-toggle="modal"
                                                    data-target="#modelSchool">Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>A/Nikawewa M.V</td>
                                    <td>Ihala Magama Rd, Nikawewa</td>
                                    <td>Anuradhapura</td>
                                    <td>Mr. K S Sumanapala</td>
                                    <td>071-4232885</td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <button class="btn btn-sm btn-default edit" data-school-id="1" data-toggle="modal"
                                                    data-target="#modelSchool">Edit
                                            </button>
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

<!-- Model -->
<div class="modal inmodal" id="modelSchool" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-bank modal-icon"></i>
                <h4 class="modal-title">A/Nikawewa M.V</h4>
                <small>Anuradhapura</small>
            </div>
            <form action="/" method="post">
                <input type="text" class="hidden" hidden="hidden" id="school_id" name="school_id"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name </label><input type="text" class="form-control" name="name"
                                                                      value="A/Nikawewa M.V"/>
                            </div>
                            <div class="form-group">
                                <label for="address">Address </label>
                                <input type="text" name="address1" class="form-control" value="Ihala Magama Rd"/>
                                <input type="text" name="address2" class="form-control" value="Nikawewa"/>
                                <input type="text" name="city" class="form-control" value="Anuradhapura"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name of Principal </label>
                                <input name="principal" required="" type="text" class="form-control"
                                       value="Mr. K S Sumanapala"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Contact Number </label>
                                <input name="contact_no" required="" type="text" class="form-control"
                                       value="071-4232885"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save changes</button>
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
        $('.edit').click(function (e) {
            e.preventDefault();
            var school = $(this).data('school-id');
            alert(school);
            //console.log(school);
            /*$.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php //echo base_url('administrator/get_single_classroom/'); ?>",
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
            toastr.error("School adding unsuccessful", "School");
        }

    });
</script>

</body>

</html>
