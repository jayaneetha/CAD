<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

<!-- Choosen -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/chosen/chosen.css" rel="stylesheet">
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
                <h2><span class="fa fa-user"></span> Registration Requests</h2>
                <ol class="breadcrumb">
                    <li>
                        User
                    </li>
                    <li class="active">
                        <strong>Registration Requests</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Registration Requests
                                <small>Manage Requests to register to the system.</small>
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
                                    <th>School/Title</th>
                                    <th>Type</th>
                                    <th style="width: 175px">Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $user->first_name . " " . $user->last_name ?></td>
                                        <td><?= $user->title ?></td>
                                        <td><?= ucfirst($user->user_type) ?></td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-sm btn-primary accept"
                                                        data-user-id="<?= $user->id ?>"
                                                        data-user-type="<?= $user->user_type ?>">Accept
                                                </button>
                                                <a href="<?= base_url('/users/accept_reject_request/') . '/' . $user->id . '/reject' ?>"
                                                   class="btn btn-sm btn-danger" data-user-id="<?= $user->id ?>">
                                                    Reject
                                                </a>
                                                <button class="btn btn-sm btn-default btn-outline view"
                                                        data-user-id="<?= $user->id ?>"
                                                        data-user-type="<?= $user->user_type ?>"
                                                    >View
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

<!-- Accept modal -->
<div class="modal inmodal" id="modelAccept" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-users modal-icon"></i>
                <h4 id="cad-modal-title" class="modal-title">Accept Student</h4>
            </div>
            <form action="<?php echo base_url('index.php/users/accept_student/') ?>" method="POST">
                <input type="text" id="student-id" name="id" value="" hidden="hidden" class="hidden"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label class="text-center" for="donor">Assign Donor to student</label>
                                <div class="">
                                    <select name="donor" id="donor" class="form-control">
                                        <?php foreach ($donors as $donor): ?>
                                            <option
                                                value="<?= $donor->id ?>"><?= $donor->first_name . " " . $donor->last_name ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="text-center" for="password">Please enter your password to continue</label>
                                <input id="delete-class-password" type="password" class="form-control" name="password"
                                       value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="delete-class-delete" type="submit" class="btn btn-primary">Accept</button>
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

<!-- Chosen -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/chosen/chosen.jquery.js"></script>

<script type="text/javascript">
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
                    show_user_modal('registration_requests', data, userType); //show_user_modal function is in common_js.js
                }
            });
        });

        $('.accept').click(function (e) {
            e.preventDefault();
            var userId = $(this).data('user-id');
            var userType = $(this).data('user-type');

            if (userType == 'student') {
                $("#student-id").val(userId);
                $('#modelAccept').modal('show');

            } else {
                window.location.href = "<?= base_url('/users/accept_reject_request/')?>/" + userId + '/accept';
            }

        });

        $('.dataTables-example').dataTable({
            responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url('assets'); ?>/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });

        var success = <?php if(isset($success)){echo $success;}else{echo 'false';} ?>;

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };

        if (success) {
            toastr.success('Operation Success');
        }

        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

    })
    ;
</script>

</body>

</html>
