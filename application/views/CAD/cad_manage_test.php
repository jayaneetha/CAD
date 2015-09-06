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
            <div class="col-lg-10">
                <h2><span class="fa fa-users"></span> Manage Tests</h2>
                <ol class="breadcrumb">
                    <li>
                        <a>Tests</a>
                    </li>
                    <li class="active">
                        <strong>Manage Tests</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add New Test</h5>

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
                            <form action="<?= base_url('index.php/tests/add') ?>" id="add_class_form"
                                  method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Year</label>
                                    <div class="col-sm-10">
                                        <select name="year" id="year" class="form-control">
                                            <?php for ($x = 2014; $x <= 2020; $x++) {
                                                echo "<option value='$x'>$x</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Month</label>
                                    <div class="col-sm-10">
                                        <select name="month" id="month" class="form-control">
                                            <?php for ($x = 1; $x <= 12; $x++) {
                                                echo "<option value='$x'>$x</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Term</label>
                                    <div class="col-sm-10">
                                        <select name="term" id="term" class="form-control">
                                            <?php for ($x = 1; $x <= 3; $x++) {
                                                echo "<option value='$x'>$x</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="m-r-xl">
                                        <button class="btn btn-primary pull-right" type="submit">Add <span
                                                class="fa fa-plus"></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7 col-lg-7">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Manage Tests
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
                            <table class="table table-striped table-bordered table-hover dataTables-classes">
                                <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Month</th>
                                    <th>Term</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($tests as $test): ?>
                                    <tr>
                                        <td><?= $test->year ?></td>
                                        <td><?= $test->month ?></td>
                                        <td><?= $test->term ?></td>
                                        <td>
                                            <div class="btn-group-sm">
                                                <button class="btn btn-sm btn-default edit"
                                                        data-test-id="<?= $test->id ?>"
                                                        data-toggle="modal"
                                                        data-target="#modelEdit">Edit
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


<!-- Delete modal -->
<div class="modal inmodal" id="modelEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-users modal-icon"></i>
                <h4 id="cad-modal-title" class="modal-title">Delete Test</h4>
            </div>
            <form action="<?php echo base_url('index.php/tests/edit') ?>" method="POST">
                <input type="text" id="test-id" name="id" value="" hidden="hidden" class="hidden"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Year</label>
                                <div class="col-sm-10">
                                    <select name="year" id="year" class="form-control">
                                        <?php for ($x = 2014; $x <= 2020; $x++) {
                                            echo "<option value='$x'>$x</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Month</label>
                                <div class="col-sm-10">
                                    <select name="month" id="month" class="form-control">
                                        <?php for ($x = 1; $x <= 12; $x++) {
                                            echo "<option value='$x'>$x</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Term</label>
                                <div class="col-sm-10">
                                    <select name="term" id="term" class="form-control">
                                        <?php for ($x = 1; $x <= 3; $x++) {
                                            echo "<option value='$x'>$x</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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

<!-- iCheck -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/iCheck/icheck.min.js"></script>

<!-- Jquery Validate -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/validate/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {

        $('.dataTables-classes').dataTable({
            responsive: true
        });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        $('.edit').click(function (e) {
            e.preventDefault();
            var testID = $(this).data('test-id');
            $('#test-id').val(testID);

        });

        $('#class-delete').click(function (e) {
            e.preventDefault();
            var classID = $(this).data('class-id');
            $('#delete-class-id').val(classID);
            $('#modelDelete').modal('show');
        });


        $("#add_class_form").validate({

            rules: {
                name: {
                    required: true,
                    minlength: 3
                }
            }
        });

    });
</script>
</body>

</html>
