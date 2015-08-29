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
            <div class="col-lg-10">
                <h2><span class="fa fa-pencil"></span> Add Subject to Class</h2>
                <ol class="breadcrumb">
                    <li>
                        <a>School</a>
                    </li>
                    <li class="active">
                        <strong>Add Subject to Class</strong>
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
                            <h5>Add Subject
                                <small>Add a new subject to a class.</small>
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
                            <form action="<?= base_url('/index.php/schools/add_class_subjects') ?>" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Class</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="class_id" id="class_id">
                                            <?php foreach ($classes as $class) : ?>
                                                <option value="<?= $class->id ?>"><?= $class->class_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Subject</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="subject_id" id="subject_id">
                                            <?php foreach ($subjects as $subject) : ?>
                                                <option value="<?= $subject->id ?>"><?= $subject->subject_name ?></option>
                                            <?php endforeach; ?>
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
                            <h5>Manage Subject-Class Relation
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
                            <table class="table table-striped table-bordered table-hover dataTables-subjects">
                                <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($class_subjects as $item) : ?>
                                    <tr>
                                        <td><?= $item->class_name ?></td>
                                        <td><?= $item->subject_name ?></td>
                                        <td>
                                            <div class="btn-group-sm">
                                                <button class="btn btn-sm btn-danger delete"
                                                        data-class-id="<?= $item->class_id ?>"
                                                        data-subject-id="<?= $item->subject_id ?>">Delete
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
<div class="modal inmodal" id="modelDelete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-pencil modal-icon"></i>
                <h4 id="cad-modal-title" class="modal-title">Delete Class Subject</h4>
            </div>
            <form action="<?php echo base_url('index.php/schools/delete_class_subject') ?>" method="POST">
                <input type="text" id="delete-subject-id" name="subject_id" value="" hidden="hidden" class="hidden"/>
                <input type="text" id="delete-class-id" name="class_id" value="" hidden="hidden" class="hidden"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <p class="text-danger text-center">Do you really want to delete the Class Subject Relation?<br/>This cannot
                                be reversed.</p>

                            <div class="form-group">
                                <label class="text-center" for="password">Please enter your password to continue</label>
                                <input id="delete-class-password" type="password" class="form-control" name="password"
                                       value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="delete-class-delete" type="submit" class="btn btn-danger">Delete</button>
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
                toastr.success('Successfully Added');
                break;
            case 2:
                toastr.error('Failed to add the subject');
                break;
            case 3:
                toastr.success('Successfully deleted');
                break;
            case 4:
                toastr.error('Failed to delete');
                break;
            case 5:
                toastr.error('Failed to Add. Duplicate entry');
                break;
            default:
                toastr.error('Something went wrong');
        }

        $('.delete').click(function (e) {
            e.preventDefault();
            var subjectID = $(this).data('subject-id');
            var classID = $(this).data('class-id');
            $('#delete-subject-id').val(subjectID);
            $('#delete-class-id').val(classID);
            $('#modelDelete').modal('show');
        });


        $('.dataTables-classes').dataTable({
            responsive: true,
        });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
</body>

</html>
