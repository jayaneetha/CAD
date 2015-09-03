<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/navigation'); ?>

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
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $user->first_name . " " . $user->last_name ?></td>
                                        <td><?= ucfirst($user->user_type) ?></td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-sm btn-default btn-outline view"
                                                        data-user-id="<?= $user->id ?>"
                                                        data-user-type="<?= $user->user_type ?>">View
                                                </button>
                                                <button class="btn btn-sm btn-danger delete"
                                                        data-user-id="<?= $user->id ?>">Delete
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

<!-- Model Student -->
<?php
$this->load->view('partial/modals/student');
?>

<!-- Model Donor -->
<?php
$this->load->view('partial/modals/donor');
?>

<!-- Model CAD -->
<?php
$this->load->view('partial/modals/cad');
?>

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
        $('.view').click(function (e) {
            e.preventDefault();
            var userId = $(this).data('user-id');
            var userType = $(this).data('user-type');
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url('users/get_single_user/'); ?>",
                data: {
                    user_id: userId,
                    user_type: userType
                }, success: function (data) {
                    show_user_modal('manage_users', data, userType);
                }
            });
        });
        $('.delete').click(function (e) {
            e.preventDefault();
            var userId = $(this).data('user-id');
            $('#delete-user-id').val(userId);
            $('#modelDelete').modal('show');
        });


        $('.dataTables-example').dataTable({
            responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url('assets'); ?>/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });

        var success = <?= $success?>;

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };

        switch (success) {
            case 1:
                toastr.success('Successfully Deleted');
                break;
            case 2:
                toastr.error('Wrong Password.');
                break;
            case 3:
                toastr.success('Successfully Updated');
                break;
        }

    });
</script>

</body>

</html>
