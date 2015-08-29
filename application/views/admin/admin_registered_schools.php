<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/admin_navigation', array('user' => $user, 'position' => $position)); ?>

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
                                <?php foreach ($schools as $school): ?>
                                    <tr>
                                        <td><?= $school->name ?></td>
                                        <td><?= $school->address_1 . " " . $school->address_2 ?></td>
                                        <td><?= $school->city ?></td>
                                        <td><?= $school->principal ?></td>
                                        <td><?= $school->contact_no ?></td>
                                        <td>
                                            <div class="btn-group-sm">
                                                <button class="btn btn-sm btn-default edit"
                                                        data-school-id="<?= $school->id ?>" data-toggle="modal"
                                                        data-target="#modelSchool">Edit
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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

<!--School Model -->
<?php $this->load->view('partial/modals/school'); ?>

<div class="modal inmodal" id="modelDelete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn tada">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user-times modal-icon"></i>
                <h4 id="cad-modal-title" class="modal-title">Delete User</h4>
            </div>
            <form action="<?php echo base_url('users/delete_user') ?>" method="POST">
                <input type="text" id="delete-user-id" name="id" value="" hidden="hidden" class="hidden"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <p class="text-danger text-center">Do you really want to delete the user?<br/>This cannot be
                                reversed.</p>

                            <div class="form-group">
                                <label class="text-center" for="password">Please enter your password to continue</label>
                                <input id="delete-user-password" type="password" class="form-control" name="password"
                                       value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="delete-user-delete" type="submit" class="btn btn-danger">Delete</button>
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
        $('.edit').click(function (e) {
            e.preventDefault();
            var school = $(this).data('school-id');
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url('schools/get_single_school/'); ?>",
                data: {
                    school_id: school
                }, success: function (data) {
                    show_school_modal('registered_schools', data);
                }
            });

        });

        $('.dataTables-example').dataTable({
            responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url('assets'); ?>/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });

        var success = <?php echo 'false';?>;

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };

        if (success) {
            toastr.error("School adding unsuccessful", "School");
        }

    });
</script>

</body>

</html>
