<?php $this->load->view('partial/header'); ?>
<!-- i-Checks -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/iCheck/custom.css" rel="stylesheet">

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
                <h2><span class="fa fa-cloud-download"></span> Backup </h2>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>New Backup
                                <small>Create a new Backup file of the database.</small>
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
                            <form method="post" class="form-horizontal"
                                  action="<?= base_url('/index.php/backups/create') ?>">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input name="name" type="text" class="form-control" placeholder="Optional"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <div class="checkbox i-checks">
                                            <label class="control-label">
                                                <input name="download" type="checkbox" value="download" checked=""> <i></i>
                                                <span class="fa fa-download"></span> <b>Download File</b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="pull-right">
                                            <div class="btn-group">
                                                <button class="btn btn-primary btn-outline" type="submit"><span
                                                        class="fa fa-cloud"></span> Create
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Past Backups
                                <small>Past Backup files of the database.</small>
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
                                    <th>Date</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($backups as $backup): ?>
                                    <tr>
                                        <td><?= $backup->filename ?></td>
                                        <td><?= substr($backup->created_at, 0, 10) ?></td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <a href="<?= base_url('/index.php/backups/download/' . $backup->id) ?>"
                                                   class="btn btn-sm btn-default btn-outline"><span
                                                        class="fa fa-download"></span></a>
                                                <button class="btn btn-sm btn-outline btn-danger delete"
                                                        data-backup-id="<?= $backup->id ?>"> <span class="fa fa-trash"></span>
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

<!-- Modal Delete -->
<div class="modal inmodal" id="modelDelete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn tada">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-cloud modal-icon"></i>
                <h4 id="cad-modal-title" class="modal-title">Delete Backup</h4>
            </div>
            <form action="<?php echo base_url('/index.php/backups/delete') ?>" method="POST">
                <input type="text" id="delete-backup-id" name="id" value="" hidden="hidden" class="hidden"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <p class="text-danger text-center">Do you really want to delete the Backup?<br/>This cannot be
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
                    <button id="delete-backup-delete" type="submit" class="btn btn-danger">Delete</button>
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

<!-- iCheck -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/iCheck/icheck.min.js"></script>

<!-- Data Tables -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.tableTools.min.js"></script>


<script>
    $(document).ready(function () {

        var success = <?= $success ?>;

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };

        switch (success) {
            case 0:
                break;
            case 1:
                toastr.success("Backup added successfully");
                break;
            case 2:
                toastr.error("Error in adding backup");
                break;
            case 3:
                toastr.success("Successfully deleted the backup");
                break;
            case 4:
                toastr.error("Error in deleting backup");
                break;
            case 5:
                toastr.error("Authentication failed");
                break;
            default:
                toastr.error("Something wrong happened");
        }

        $('.delete').click(function (e) {
            e.preventDefault();
            var backupId = $(this).data('backup-id');
            $('#delete-backup-id').val(backupId);
            $('#modelDelete').modal('show');
        });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        $('.dataTables-example').dataTable({
            responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url('assets'); ?>/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });


    });
</script>

</body>

</html>
